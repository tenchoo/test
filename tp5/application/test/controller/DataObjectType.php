<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Menu Test 后台对象定义测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class DataObjectType extends Ava {
	//添加对象
	public function add(){
		if(IS_AJAX){
			$data = $this->getPost('AM_DataObjectType_add','aid,name,code,is_sys');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_DataObjectType_add');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['name','',LL('need-mark type_name')],
				['code','',LL('need-mark type_code')],
				['is_sys',0,LL('need-mark is_sys')],
			]);
	    return $this -> fetch('ava/test');
		}
	}

	//添加对象
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_DataObjectType_view','aid,kword,order,current_page,per_page');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_DataObjectType_view');
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
}