<?php
/**
 * 张健 hzboye013@163.com
 * addby sublime snippets
 * File Test 附件测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Financial extends Ava{

    //用户利息记录
    public function payment(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_payment','uid,id,current_page,per_page');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_payment');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['uid',366,LL('need-mark UID')],
                ['id','',LL('project id')],
                ['current_page','',L('page')],
                ['per_page','',LL('page size')],
            ]);
            return $this->fetch('ava/test');
        }
    }

    //查列表
    public function query(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_query','current_page,per_page');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_query');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['current_page','',L('page')],
                ['per_page','',LL('page size')],
            ]);
            return $this->fetch('ava/test');
        }
    }


    //购买
    public function buy(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_buy','id,uid,money,test');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_buy');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['uid',100,LL('need-mark uid')],
                ['test',0,'test'],
                ['id',1,LL('need-mark 购买项目id')],
                ['money',10000,LL('need-mark 购买金额,分')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //转出
    public function takeout(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_takeout','id,uid,money');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_takeout');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['uid',100,LL('need-mark uid')],
                ['id',1,LL('need-mark 项目id')],
                ['money',10000,LL('need-mark 购买金额,分')],
            ]);
            return $this->fetch('ava/test');
        }
    }

    //详情
    public function item(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_item','id,uid');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_item');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['id',1,LL('need-mark id')],
                ['uid','','uid'],
            ]);
            return $this->fetch('ava/test');
        }
    }

    //金融首页
    public function index(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Financial_index','size');
            $s = new BoyeService();
            $r = $s->callRemote("",$data,false);
            return $this->parseResult($r);
        }else{
            $this->assign('type','BY_Financial_index');
            $this->assign('field',[
                ['api_ver',$this->api_ver,LL('need-mark api version')],
                ['size',5,LL('page size')],
            ]);
            return $this->fetch('ava/test');
        }
    }

}