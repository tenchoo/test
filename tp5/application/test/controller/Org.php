<?php
/**
 * @Author   : rainbow
 * @Email    : hzboye010@163.com
 * @DateTime : 2016-11-24 10:14:19
 * @Description : 机构测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Org extends Ava {
	//联盟店 用户列表
	public function member(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_member','aid,oid,kword,order,per_page,current_page');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_member');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['oid',1,LL('need-mark top_oid')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','create_time desc',L('order')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//删除机构
	public function del(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_del','aid,oid');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_del');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark operator_uid')],
				['oid',7,LL('need-mark org_id')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//注册申请
	public function regApply(){
		if(IS_AJAX){
			$data = $this->getPost('BY_Org_regApply','city,name,alias,mobile,code,email,pass,repass,linkman,address');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Org_regApply');
			$this->assign('code_type', 1);//注册
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['city','330100',LL('need-mark city')],
				['name','杭州博也',LL('need-mark name')],
				['alias','杭州博也',LL('need-mark alias')],
				['code','boye',LL('need-mark code')],
				// ['brand','boye',LL('need-mark brand')],
				['mobile','12345678901',LL('need-mark mobile')],
				// ['validate_code','',LL('need-mark validate_code')],
				['email','123@qq.com',LL('need-mark email')],
				['pass','111111',LL('need-mark pass')],
				['repass','111111',LL('need-mark repass')],
				['linkman','天德池',LL('need-mark linkman')],
				['address','杭州天德池浴场',LL('need-mark address')],
			]);
			return $this->fetch('user/register');
		}
	}
	//申请列表
	public function regList(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_regList','aid,kword,order,per_page,current_page');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_regList');
			$this->assign('code_type', 1);//注册
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','create_time desc',L('order')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//申请审核 - 通过pass 驳回ban 删除del
	public function regVerify(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_regVerify','aid,apply_id,pass,code,brand,msg');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_regVerify');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['apply_id',1,L('org_apply_id')],
				['pass',1,L('op_code')], //1pass 0ban 2del
				['code','boye3',L('pass_org_code')],
				['brand','品牌3',L('pass_org_brand')],
				['msg','',L('not_pass_msg')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//add - 暂时
	public function add(){
		if(IS_AJAX){
			$data = $this->getPost('BY_Org_add','city,name,alias,mobile,code,email,pass,brand,linkman,address');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Org_add');
			$this->assign('code_type', 1);//注册
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['city','330100',LL('need-mark city')],
				['name','杭州博也2',LL('need-mark name')],
				['alias','杭州博也2',LL('need-mark alias')],
				['code','boye2',LL('need-mark code')],
				['brand','博也2',LL('need-mark brand')],
				['mobile','12345678916',LL('need-mark mobile')],
				['email','1243@qq.com',LL('need-mark email')],
				['pass','111111',LL('need-mark pass')],
				['linkman','天德池',LL('need-mark linkman')],
				['address','杭州天德池浴场',LL('need-mark address')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//添加 下级机构
	public function addChild(){
		if(IS_AJAX){
			$data = $this->getPost('BY_Org_addChild','aid,parent,city,name,alias,code,address');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Org_addChild');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['parent',1,LL('need-mark parent_id')],
				['city','330100',LL('need-mark city')],
				['name','杭州博也2',LL('need-mark name')],
				['alias','杭州博也2',LL('need-mark alias')],
				['code','boye2',LL('need-mark code')],
				['address','杭州天德池浴场',LL('need-mark address')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//设置机构管理员
	public function setAdmin(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_setAdmin','aid,uids,oid,if_add');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_setAdmin');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark operator_uid')],
				['oid',23,LL('need-mark oid')],
				['uids','11,7',LL('need-mark uids')],
				['if_add',1,L('if_add')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//设置机构用户
	public function setMember(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_setMember','aid,uids,oid,if_add');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_setMember');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark operator_uid')],
				['oid',23,LL('need-mark oid')],
				['uids','11,7',LL('need-mark uids')],
				['if_add',1,L('if_add')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//查看机构
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_Org_view','aid,parent,current_page,kword,order,per_page');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_Org_view');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark operator_uid')],
				['parent',0,L('need-mark parent_oid')],
        ['current_page',1, L('page-number')],
        ['kword','', L('key-word')],
        ['order','create_time asc', L('order')],
        ['per_page',10, L('page-size')],
			]);
			return $this->fetch('ava/test');
		}
	}
}