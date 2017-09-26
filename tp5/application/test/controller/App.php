<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * app首页列表 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class App extends Ava{

    //首页
    public function index(){
        if(IS_AJAX){
            $data = [
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_App_index',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_App_index');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
            ]);
            return $this->fetch('ava/test');
        }

    }
    //获取viewPage 某页面
    public function viewPage(){
        if(IS_AJAX){
            $data = [
                'page_id'   =>input('post.page_id',''),
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_App_viewPage',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_App_viewPage');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['page_id',1,LL('need-mark view-page ID')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //获取viewPage总览
    public function queryPage(){
        if(IS_AJAX){
            $data = [
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_App_queryPage',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);

        }else{
            $this->assign('type','BY_App_queryPage');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
            ]);
            return $this->fetch('ava/test');
        }
    }
}