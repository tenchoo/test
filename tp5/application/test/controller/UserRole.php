<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * UserRole Test 用户角色关联 测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class UserRole extends Ava {

	//查看用户角色
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_UserRole_view','aid,uid');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_UserRole_view');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['uid',11,LL('need-mark uid')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//设置用户角色
	public function set(){
		if(IS_AJAX){
			$data = $this->getPost('AM_UserRole_set','aid,uid,role_id,if_add');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_UserRole_set');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['uid',11,LL('need-mark uid')],
        ['role_id',2,LL('need-mark role_id')],
				['if_add',1,L('need-mark if_add')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}