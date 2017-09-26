<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * app首页列表 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Datatree extends Ava{

    //首页
    public function child(){
        if(IS_AJAX){
            $data = [
                'api_ver'   =>$this->api_ver,
                'type'      =>'BY_Datatree_child',
                'id'        =>input('post.id','0')
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Datatree_child');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['id','6312',LL('need-mark id')],
            ]);
            return $this->fetch('ava/test');
        }

    }
}