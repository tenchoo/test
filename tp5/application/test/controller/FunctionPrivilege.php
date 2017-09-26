<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * FunctionPrivilege Test 后台菜单测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class FunctionPrivilege extends Ava {

	//获取资源操作列表
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_FunctionPrivilege_view','aid,res_id');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_FunctionPrivilege_view');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['res_id',1,LL('need-mark res_id')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//设置资源操作
	public function set(){
		if(IS_AJAX){
      $data = $this->getPost('AM_FunctionPrivilege_set','aid,res_id,op_id');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_FunctionPrivilege_set');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['res_id',2,L('res_id')],
				['op_id','1,2,3',L('op_id')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}