<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Resource Test 后台菜单测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Resource extends Ava {

	//获取用户菜单列表
	public function menu(){
		if(IS_AJAX){
			$data    = $this->getPost('AM_Resource_menu','aid,parent,fresh');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_Resource_menu');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['parent',0,L('parent')],
				['fresh',0,L('fresh')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//获取资源列表
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Resource_view','aid,parent,kword,order,current_page,per_page');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_Resource_view');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['parent',0,L('parent')],
				['current_page',1, L('page-number')],
        ['kword','', L('key-word')],
        ['order','id desc', L('order')],
        ['per_page',10, L('page-size')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
	//添加资源
	public function add(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Resource_add','aid,code,title,desc,parent,object_id,sort,ext');
      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
    	$this->assign('type','AM_Resource_add');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['aid','',LL('need-mark admin_login_uid')],
				['code','RES_MENU_02_01',LL('need-mark code')],
				['title','用户管理',LL('need-mark title')],
				['desc','用户管理',L('desc')],
				['parent',0,L('parent')],
				['object_id','2',LL('need-mark object_id')],
				['sort',0,L('sort')],
				['ext','#',L('ext')],
			]);
	    return $this -> fetch('ava/test');
		}
	}
}