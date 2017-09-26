<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * RolePrivilege Test 角色权限关联 测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class RolePrivilege extends Ava {

	//查看角色权限
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_RolePrivilege_view','aid,role_id');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_RolePrivilege_view');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid',11,LL('need-mark admin_login_uid')],
				['role_id',1,LL('need-mark role_id')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//重新设置角色权限
	public function set(){
		if(IS_AJAX){
			$data = $this->getPost('AM_RolePrivilege_set','aid,func_ids,role_id');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_RolePrivilege_set');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid',11,LL('need-mark admin_login_uid')],
				['func_ids','1,2',LL('need-mark func_ids')],
				['role_id',4,LL('need-mark role_id')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}