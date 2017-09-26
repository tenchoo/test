<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * 获取app配置 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Config extends Ava{
    //接口配置
    public function app(){
        if(IS_POST){
            $data = [
                'api_ver' =>$this->api_ver,
                'type'    =>'BY_Config_app',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Config_app');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //最新版本
    public function version(){
        if(IS_POST){
            $data = [
                'app_type'  =>input('post.app_type',''), //app_global_param
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_Config_version',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Config_version');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['app_type','ios',LL('need-mark app-type')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //获取position
    public function position(){
        if(IS_POST){
            $data = [
                'id'        =>input('post.id',''),
                'code'      =>input('post.code',''),
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_Config_position',
            ];
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Config_position');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['id','',L('datatree-id')],
                ['code','house_orientation',L('datatree-code')],
            ]);
            return $this->fetch('ava/test');
        }
    }


    // public function force_refresh(){
    //     if(IS_POST){
    //         $data = [
    //             'api_ver'   =>$this->api_ver,
    //             'notify_id' =>$this->notify_id,
    //             'type'      =>'BY_Config_force_refresh',
    //             'alg'       =>'md5',
    //         ];
    //         $service = new BoyeServiceApi();
    //         $result = $service->callRemote("",$data,false);
    //         return $this->parseResult($result);
    //     }else{
    //         $this->fetch();
    //     }
    // }
}