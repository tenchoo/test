<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Menu Test 后台对象测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class DataObject extends Ava {

	//查看对象
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_DataObject_view','aid,kword,order,current_page,per_page');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_DataObject_view');
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
	//添加对象
	public function add(){
		if(IS_AJAX){
			$data = $this->getPost('AM_DataObject_view','aid,name,pk,code,type_id');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_DataObject_add');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['name','',LL('need-mark name')],
				['pk','id',LL('need-mark pk')],
				['code','',LL('need-mark code')],
				['type_id',2,LL('need-mark type_id')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}