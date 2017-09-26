<?php
namespace app\index\controller;

use app\src\base\enum\ErrorCode;
use app\extend\CryptUtils;
use app\extend\CacheUtils;
use think\Exception;
use app\src\base\helper\ExceptionHelper;

class Index extends Base {

    private $time;         //请求的时间戳,float
    private $data;         //加密过的数据
    private $type;         //业务类型
    private $sign;         //签名
    private $api_ver;      //当前接口的版本，数字从100开始计数
    private $app_version;  //当前软件的版本
    private $app_type;     //当前软件的类型 ，ios,android,pc,test,admin,web

    private $decrypt_data; //解密过的数据

    public function index() {
        try{
            // $pre = 'Domain';
            // admin不做成app,暂不判断
            $pre = substr($this->type,0,3);
            if($pre == 'BY_') $pre='Domain';
            elseif($pre == 'AM_') $pre='Manage';
            else{
                $this->apiReturnErr(Linvalid('type'));
            }

            //已登录会话ID
            $login_s_id = $this->getLoginSId();

            $type = preg_replace("/_/","/",substr(ltrim($this->type),3),1);
            $type = preg_split("/\//",$type);

            if(count($type) < 2){
                $this->apiReturnErr(Linvalid("type"));
            }

            $action_name     = $type[1];
            $controller_name = $type[0];
            $domainClass = $controller_name.$pre.'/'.$action_name;

            $this->decrypt_data['domain_class'] = $domainClass;

            $cls_name = "\\app\\index\\domain\\".$controller_name.$pre;

            if(!class_exists($cls_name,true)){
                $this->apiReturnErr($cls_name,ErrorCode::Not_Found_Resource);
            }
            // halt($this->decrypt_data);
            $class = new  $cls_name($this->decrypt_data);
            if(!method_exists($class,$action_name)){
                $this->apiReturnErr($cls_name.'->'.$action_name,ErrorCode::Not_Found_Resource);
            }
            addLog('',$cls_name.$action_name,$this->decrypt_data,'',true);
            //4. 调用方法
            $result = $class->$action_name();

            addLog($domainClass,$result,$_POST,"[接口调用结果]");
            if(!$result['status']){
                $this->apiReturnErr($result['info'],ErrorCode::Business_Error);
            }

            //1. 这一步不会走到
            $this->apiReturnErr("无法处理!",ErrorCode::Business_Error);
        }catch (Exception $ex) {
            $this->apiReturnErr(ExceptionHelper::getErrorString($ex), ErrorCode::Business_Error);
        }

    }


    private function checkParam($arr){
        foreach ($arr as $v) {
            $name  = preg_replace('/\/\w$/', '', $v);
            empty($this->_post($v)) && $this->apiReturnErr(Llack($v));
            $this->$name = $this->_post($v);
            unset($_POST[$name]);
        }
    }
    protected function _initialize(){
        addLog("_initialize",$_GET,$_POST,"[接口初始化]");

        $this->_initParameter();
        $this->_check();
        CacheUtils::initAppConfig();
    }

    /**
     * 初始化公共参数
     */
    private function _initParameter(){
        $this->checkParam(['time/f','sign','data','type','notify_id/d','api_ver/d','app_version','app_type','lang']);
    }

    /**
     * 解密验证
     */
    private function _check(){

        //1. 请求时间戳校验
        $now = microtime(true);

        //时间误差 +- 1分钟
        if($now - 60 > $this->time || $this->time > $now + 60){
            $this->apiReturnErr("该请求已失效!",ErrorCode::Invalid_Parameter);
        }
        //2. 签名校验
        $param = [
            'client_secret' =>$this->client_secret,
            'notify_id'     =>$this->notify_id,
            'time'          =>$this->time,
            'data'          =>$this->data,
            'type'          =>$this->type,
        ];
        try{
            if(!CryptUtils::verify_sign($this->sign,$param)){
                $this->apiReturnErr("签名验证错误!");
            }

            //3. 数据解密
            $this->decrypt_data = $param;
            $this->decrypt_data['api_ver']     = $this->api_ver;
            $this->decrypt_data['client_id']   = $this->client_id;
            $this->decrypt_data['app_version'] = $this->app_version;
            $this->decrypt_data['app_type']    = $this->app_type;
            $this->decrypt_data['lang']        = $this->lang;

            $data = CryptUtils::decrypt($this->data);
            foreach($data as $key=>$vo){
                $this->decrypt_data['_data_'.$key] = $vo;
            }
        }catch (Exception $e){
            $this->apiReturnErr($e->getMessage());
        }

    }

    /**
     * 获取登录会话id
     * @return string
     */
    private function getLoginSId(){
        $login_s_id = $this->_get('s_id','');
        if(empty($login_s_id)){
            $login_s_id = isset($this->decrypt_data['_data_s_id'])?($this->decrypt_data['_data_s_id']):"";
        }

        return $login_s_id;
    }

}
