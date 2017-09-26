<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Operator Test 操作定义测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Operator extends Ava {

	//查看操作
	public function view(){
		if(IS_AJAX){
			$data    = $this->getPost('AM_Operator_view','aid,kword,order,current_page,per_page');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_Operator_view');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['current_page',1, L('page-number')],
        ['kword','', L('key-word')],
        ['order','id desc', L('order')],
        ['per_page',10, L('page-size')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//添加操作
	public function add(){
		if(IS_AJAX){
			$data    = $this->getPost('AM_Operator_add','aid,name,code,desc');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_Operator_add');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['name','',LL('need-mark name')],
				['code','',LL('need-mark code')],
				['desc','',LL('need-mark desc')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}