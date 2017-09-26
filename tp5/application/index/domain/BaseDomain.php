<?php
/**
 * Created by PhpStorm.
 * User: hebidu
 * Date: 15/12/3
 * Time: 18:01
 * editor : rainbow
 */
namespace app\index\domain;

use app\src\base\enum\ErrorCode;
use app\src\base\helper\ValidateHelper;
use app\src\log\model\ApiHistory;
use app\extend\CryptUtils;
use think\Debug;
use think\exception\DbException;
use think\Response;

/**
 * 基础领域模型
 * Class BaseDomain
 * @package app\src\domain
 */
class BaseDomain {

    protected $allowType     = ["json", "rss", "html"];
    protected $business_code = '';
    protected $data;
    protected $api_ver       = 100;//请求的api_ver
    protected $client_id;
    protected $client_secret;
    protected $domain_class;
    protected $lang;
    protected $notify_id;
    protected $time;
    protected $type;


    private function checkParam($arr){
        foreach ($arr as $v) {
            $name  = preg_replace('/\/\w$/', '', $v);
            empty($this->data[$name]) && $this->apiReturnErr(Llack($name));
            $this->$v = $this->data[$name];
        }
    }
    public function __construct($data) {
        debug('begin');
        $this->data = $data;
        $this->checkParam(['client_secret','notify_id/d','time/f','client_id','domain_class','api_ver/d','lang','type']);
    }

    /**
     * 服务端允许的api版本/列表
     * @param string $vers       许可的api_vers
     * @param string $updateMsg  string [更新的说明]
     * @internal param $ [int|array]     $vers
     */
    protected function checkVersion($vers = 100,$updateMsg='') {
        if(!is_array($vers)) $vers = [intval($vers)];
        // 是否存在 等值字符串/数字
        if(!in_array($this->api_ver,$vers)) {
            $updateMsg = lang('tip_update_api_version',['version'=> implode(',', $vers)]);
            $this->apiReturnErr($updateMsg, ErrorCode::Api_Need_Update);
        }
        return  $this->api_ver;

    }

    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @return array
     * @throws \Exception
     * @throws \app\src\base\exception\ApiException
     * @internal param String $type AJAX返回数据格式
     * @internal param int $json_option 传递给json_encode的option参数
     */
    protected function ajaxReturn($data) {
        $code = $data['code'];
        $type = $code ? "F" :"T" ;

        $data = CryptUtils::encrypt($data);
        $now  = time();
        if (empty($this->notify_id)) {
            $this->notify_id = $now;
        }

        //接口         $this->domain_class
        //创建时间     START_TIME
        //请求开始时间 app_send APP传过来
        //网络传输时间 START_TIME - app_send
        //接口执行耗时 debug('begin','end',4).'s'
        //param
        //内存占用     debug('begin','end','m').'kb';
        //请求头       $_SERVER['HTTP_USER_AGENT']

        $api_end = microtime(true);
        $app_time = $this->time;
        $now = NOW_TIME;
        $cache = (isset($data['cache']) && $data['cache']) ? 1 : 0;
        if(!empty($this->domain_class)) {

            // try {
            //     $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? " unknown userAgent" : $_SERVER['HTTP_USER_AGENT'];
            //     $map = [
            //         'api_uri' => $this->domain_class,
            //         'create_time' => START_TIME,
            //         'start_time' => $app_time,
            //         'request_time' => (float)START_TIME - (float)$app_time,
            //         'cost_time' => (float)($api_end - START_TIME),
            //         'params' => 'cache:' . $cache . ';吞吐量:' . Debug::getThroughputRate() . ';内存占用:' . debug('begin', 'end', 'm') . ';HTTP代理:' . $userAgent . ';',
            //     ];

            //     $map['request_time'] = $map['request_time'] > 0 ? $map['request_time'] : 0.0;
            //     $model = new ApiHistory();
            //     $model->isUpdate(false)->save($map);

            // }catch(DbException $ex) {
            //     $data['code'] = ErrorCode::Api_EXCEPTION;
            //     $data['data'] = $ex->getMessage();
            // }
        }

        $param = [
            'client_secret' => $this->client_secret,
            'client_id'     => $this->client_id,
            'data'          => $data,
            'notify_id'     => $this->notify_id,
            'time'          => strval($now),
            'type'          => $type,
        ];
        $param['sign'] = CryptUtils::sign($param);
        unset($param['client_secret']);
        Response::create($param, 'json')->header("X-Powered-By",POWER)->send();
        exit();
    }

    /**
     * ajax返回
     * @param $data
     * @param string $msg
     * @param bool $cache
     * @internal param $i
     */
    protected function apiReturnSuc($data) {
        $this->ajaxReturn(['code' => 0, 'data' => $data]);
    }
    /**
     * ajax返回，并自动写入token返回
     * @param $data
     * @param int $code
     * @internal param $i
     */
    protected function apiReturnErr($data, $code = -1){
        //TODO: 异步收集错误信息
        $this->ajaxReturn(['code' => $code, 'data' => $data]);
    }
    /**
     * 退出应用
     * @param $r
     * @internal param bool $retSuc
     */
    protected function returnResult($r){
        $this->exitWhenError($r,true);
    }

    /**
     * 退出应用当发生错误的时候
     * @param $r
     * @param bool $retSuc
     */
    protected function exitWhenError($r,$retSuc=false) {

        if($r['status'] == false){
            $this->apiReturnErr($r['info']);
        }elseif ($retSuc){
            $info = $r['info'];

            if(!is_int($info) && !ValidateHelper::isNumberStr($info)){
                $this->apiReturnSuc($info);
            }
            $id = intval($info);
            //如果是数字，则应该是添加或修改操作
            //对于这种情况，如果大于0 则默认成功 否则 失败
            if($id > 0){
                $this->apiReturnSuc(lang("success"));
            }else{
                $this->apiReturnErr(lang("fail"));
            }

        }
    }

    /**
     * 仅适用 index模块
     * @param $key
     * @param string $default
     * @param string $emptyErrMsg 是否
     * @return mixed
     */
    public function _post($key, $default = '', $emptyErrMsg = false) {

        $value = isset($this->data["_data_" . $key]) ? $this->data["_data_" . $key] : $default;

        if ($default === $value){
            if($emptyErrMsg) {
                $emptyErrMsg = Llack($key);
                $this->apiReturnErr($emptyErrMsg, ErrorCode::Lack_Parameter);
            }
        }

        $value = $this->escapeEmoji($value);

        if ($default == $value && !empty($emptyErrMsg)) {
            $emptyErrMsg = Llack($key);
            $this->apiReturnErr($emptyErrMsg, ErrorCode::Lack_Parameter);
        }

        return $value;
    }

    /**
     * @param $key
     * @param string $default
     * @param string $emptyErrMsg 为空时的报错
     * @return mixed
     */
    public function _get($key, $default = '', $emptyErrMsg = '') {
        $this->_post($key,$default,$emptyErrMsg);
    }

    /**
     * 放到utils中，作为工具类
     * @brief 干掉emoji
     * @autho chenjinya@baidu.com
     * @param {String} $strText
     * @return {String} removeEmoji
     **/
    protected function escapeEmoji($strText, $bool = false) {
        $preg = '/\\\ud([8-9a-f][0-9a-z]{2})/i';
        if ($bool == true) {
            $boolPregRes = (preg_match($preg, json_encode($strText, true)));
            return $boolPregRes;
        } else {
            $strPregRes = (preg_replace($preg, '', json_encode($strText, true)));
            $strRet = json_decode($strPregRes, JSON_OBJECT_AS_ARRAY);

            if ( is_string($strRet) && strlen($strRet) == 0) {
                return "";
            }

            return $strRet;
        }
    }

    /**
     * 获取post参数并返回
     * $need:是否必选
     * a|0|int   默认0
     * a         默认''
     * a|p       默认'p'
     * a||mulint 数字','链接字符串
     * a||float  小数
     * @DateTime 2016-12-13T10:25:17+0800
     * @param    [type]                   $str  [description]
     * @param    boolean                  $need [description]
     * @return   [type]                         [description]
     */
    protected function getPost($str,$need=false){
        if(empty($str) || !is_string($str)) return [];
        $r = [];
        $arr = explode(',', $str);
        $data = $this->data;
        foreach ($arr as $v) {
            //补全预定义
            $p = explode('|', $v);
            !isset($p[1]) && $p[1]='';   //默认值空字符串
            !isset($p[2]) && $p[2]='str';//默认类型字符串
            $key = '_data_'.$p[0];
            //_post number bug
            // if($need) $post = $this->_post($p[0],$p[1],Llack($p[0]));
            // else  $post = $this->_post($p[0],$p[1]);
            // fix bug
            !isset($data[$key]) && $data[$key]='';
            if($need && $data[$key] === ''){
                $this->apiReturnErr(Llack($p[0]), ErrorCode::Lack_Parameter);
            }
            $post = $data[$key]==='' ? $p[1] : $data[$key];
            if($p[2] === 'int'){
                $post = intval($post);
            }elseif($p[2] === 'float'){
                $post = floatval($post);
            }elseif($p[2] === 'mulint'){
                $post = array_unique(explode(',', $post));
                $temp = [];
                foreach ($post as $v) {
                    if(is_numeric($v)){
                        $temp[] = $v;
                    }else{
                        $this->apiReturnErr(Linvalid($p[0]), ErrorCode::Invalid_Parameter);
                    }
                }
                $post = implode(',', $temp);
            }
            $r[$p[0]] = $post;
        }
        return $r;
    }
    /**
     * 合并必选和可选post参数并返回
     * $str: 需要检查的post参数
     * $oth_str: 不需检查的post参数
     */
    protected function parsePost($str='',$oth_str=''){
        return array_merge($this->getPost($str,true),$this->getPost($oth_str,false));
    }

    /**
     * 获取原始数据
     * @return array
     */
    protected function getOriginData(){
        $tmp = [];
        foreach ($this->data as $key=>$vo){
            $k = str_replace("_data_","",$key);
            $tmp[$k] = $vo;
        }
        return $tmp;
    }

}