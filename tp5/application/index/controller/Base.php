<?php
/**
 * Created by PhpStorm.
 * User: hebidu
 * Date: 15/7/3
 * Time: 20:22
 */

namespace app\index\controller;

use think\Controller;
use app\extend\DesCrypt;
use app\extend\CryptUtils;
use app\src\oauth2\logic\ClientLogicV2;
use app\src\base\enum\ErrorCode;
use think\Exception;
use think\Response;
use think\Request;


/**
 * 接口基类
 * Class Base
 * 数据封装后date + client_id + form 传过来
 * @author 老胖子-何必都 <hebiduhebi@126.com>
 * @package app\index\Controller
 */
abstract class Base extends Controller{

    protected $encrypt_key   = "";
    protected $client_id     = "";
    protected $client_secret = "";
    protected $notify_id     = "";

    // protected $allow_controller = ['token','file','alipayapp','alipayrefund','wxpayapp','alipaydirect','contract','test','repair'];

    /**
     * 构造函数
     */
    // public function __construct(){
    //     parent::__construct();
    public function initialize(){
        // header("X-Copyright:http://www.itboye.com");

        // $controller = strtolower(request()->controller());
        // if(empty($controller) || ( !in_array($controller,$this->allow_controller) &&  $controller != "index" )){
        //     $this->returnErr(ErrorCode::Not_Found_Resource,"请求资源不存在!");
        // }

        $this->getClientID(); // 1.client_id => client_secret
        // index.php 专用
        if(method_exists($this,"_initialize")){
            // 2.itboye 3.from client_secret => 最初的请求参数 => $_POST
            $this->decodePost();
            $this->_initialize();
        }
    }

    protected function getClientID(){
        $client_id = $this->_param("client_id","");
        if(empty($client_id)){
            $this->returnErr(Llack("client_id"),ErrorCode::Lack_Parameter);
        }
        $_GET['client_id'] = $client_id;
        $this->client_id = $client_id;
        unset($_POST['client_id']);

        $r = (new ClientLogicV2)->getClientSecret($this->client_id);
        if(empty($r['status']) || empty($r['info'])){
            $this->returnErr(Linvalid('Client_ID'),ErrorCode::Invalid_Parameter);
        }
        $this->client_secret = $r['info'];
    }

    protected function decodePost(){
        $post = $this->_post('itboye','');

        $data = DesCrypt::decode(base64_decode($post),$this->client_secret);
        $data = $this->filter_post($data);

        $obj = json_decode($data,JSON_OBJECT_AS_ARRAY);
        $this->request->post($obj);
    }

    /**
     * 过滤末尾多余空白符 ASCII码等于7的奇怪符号
     * @param $post
     * @return string
     */
    protected function filter_post($post){
        $post = trim($post);
        for ($i=strlen($post)-1;$i>=0;$i--) {
            $ord = ord($post[$i]);
            if($ord > 31 && $ord != 127){
                $post = substr($post,0,$i+1);
                return $post;
            }
        }
        return $post;
    }

    /**
     * 返回加密后的数据
     * @access protected
     * @param mixed $data 要返回的数据，未加密
     * @return array
     */
    protected function ajaxReturn($data) {

        $code = $data['code'];
        if ($code == 0) {
            $type = "T";
        } else {
            $type = "F";
        }

        $data = CryptUtils::encrypt($data);
        $now  = time();
        if (empty($this->notify_id)) {
            $this->notify_id = $now;
        }

        $param = [
            'client_secret' => $this->client_secret,
            // 'client_id'     => $this->client_id,
            'data'          => $data,
            'notify_id'     => $this->notify_id,
            'time'          => strval($now),
            'type'          => $type,
        ];
        $param['sign'] = CryptUtils::sign($param);
        unset($param['client_secret']);
        Response::create($param, "json",200)->header("X-Powered-By","WWW.ITBOYE.COM")->send();
        exit(0);

    }

    /**
     * ajax返回
     * @param $data
     * @internal param $i
     * @return array
     */
    protected function apiReturnSuc($data){
        $this->ajaxReturn(['code'=>0,'data'=>$data,'notify_id'=>$this->notify_id]);
    }
    /**
     * ajax返回，并自动写入token返回
     * @param $data
     * @param int $code
     * @internal param $i
     * @return array
     */
    protected function apiReturnErr($data,$code=-1){
        $this->ajaxReturn(['code'=>$code,'data'=>$data,'notify_id'=>$this->notify_id]);
    }
    protected function returnErr($data,$code=-1){
        echo $code.":".$data; // 直接输出错误,解析前
        exit;
    }


    /**
     * @param $key
     * @param string $default
     * @param string $nullMsg  未定义时的报错
     * @return mixed
     */
    public function _param($key,$default=null,$nullMsg=null){
        return $this->checkParamNull(input("param.".$key),$key,$default,$nullMsg);
    }
    public function _post($key,$default=null,$nullMsg=null){
        return $this->checkParamNull(input("post.".$key),$key,$default,$nullMsg);
    }
    public function _get($key,$default=null,$nullMsg=null){
        return $this->checkParamNull(input("get.".$key),$key,$default,$nullMsg);
    }
    public function checkParamNull($val,$key,$df,$nul){
        $name  = preg_replace('/\/\w$/', '', $key);
        if(is_null($val)){
            if(!is_null($nul)){
                $this->apiReturnErr($nul ?: Lack($name));
            }else{
                return $df;
            }
        }
        return $val;
    }


}