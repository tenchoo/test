<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * 收货地址接口 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Address extends Ava{

	//收货地址添加
	public function add(){
		if(IS_AJAX){

			$data = [
				'uid'         => input('post.uid',''),
				'country'     => input('post.country',''),
				'provinceid'  => input('post.provinceid',''),
				'cityid'      => input('post.cityid',''),
				'areaid'      => input('post.areaid',''),
				'detailinfo'  => input('post.detailinfo',''),
				'contactname' => input('post.contactname',''),
				'mobile'      => input('post.mobile',''),
				'wxno'        => input('post.wxno',''),
				'postal_code' => input('post.postal_code',''),
				'province'    => input('post.province',''),
				'city'        => input('post.city',''),
				'area'        => input('post.area',''),
				'id_card'     => input('post.id_card',''),
				'default'     => input('post.default',''),
				'api_ver'     =>$this->api_ver,
				'type'        =>'BY_Address_add',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);

		}else{
			$this->assign('type','BY_Address_add');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['uid',42,LL('need-mark user ID')],
				['country',1017,LL('need-mark country ID default')],
				['provinceid',330000,LL('need-mark province ID')],
				['cityid',330100,LL('need-mark city ID')],
				['areaid',330101,LL('need-mark area ID')],
				['detailinfo','xia sha',LL('need-mark address-detail')],
				['contactname','rainbow',LL('need-mark contact name')],
				['mobile','17195862186',LL('need-mark phone-number')],
				['wxno','',L('wxno')],
				['postal_code',321000,LL('need-mark postal-code')],
				['province','浙江省',LL('need-mark province')],
				['city','杭州市',LL('need-mark city')],
				['area','市辖区',LL('need-mark area')],
				['id_card','',L('idnumber')],
				['default','',LL('if default')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//收货地址更新
	public function update(){
		if(IS_AJAX){

			$data = [
				'uid'         => input('post.uid',''),
				'id'          => input('post.id',''),
				'country'     => input('post.country',''),
				'provinceid'  => input('post.provinceid',''),
				'cityid'      => input('post.cityid',''),
				'areaid'      => input('post.areaid',''),
				'detailinfo'  => input('post.detailinfo',''),
				'contactname' => input('post.contactname',''),
				'mobile'      => input('post.mobile',''),
				'wxno'        => input('post.wxno',''),
				'postal_code' => input('post.postal_code',''),
				'province'    => input('post.province',''),
				'city'        => input('post.city',''),
				'area'        => input('post.area',''),
				'id_card'     => input('post.id_card',''),
				'default'     => input('post.default',''),
				'api_ver'     =>$this->api_ver,
				'type'        =>'BY_Address_update',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);

		}else{
			$this->assign('type','BY_Address_update');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['uid',42,LL('need-mark user ID')],
				['id',84,LL('need-mark address ID')],
				['country','',LL('country ID default')],
				['provinceid','',LL('province ID')],
				['cityid','',LL('city ID')],
				['areaid','',LL('area ID')],
				['detailinfo','',L('address-detail')],
				['contactname','',LL('contact name')],
				['mobile','',L('phone-number')],
				['wxno','',L('wxno')],
				['postal_code','',L('postal-code')],
				['province','',L('province')],
				['city','',L('city')],
				['area','',L('area')],
				['id_card','',L('idnumber')],
				['default','',LL('if default')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//收货地址查询-ALL
	public function query(){
		if(IS_AJAX){

			$data = [
				'uid'         => input('post.uid',''),
				'api_ver'     =>$this->api_ver,
				'type'        =>'BY_Address_queryNoPaging',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);

		}else{
			$this->assign('type','BY_Address_queryNoPaging');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['uid',42,LL('need-mark user ID')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//收货地址删除
	public function delete(){
		if(IS_AJAX){
			$data = [
				'id'          => input('post.id',''),
				'uid'         => input('post.uid',''),
				'api_ver'     => $this->api_ver,
				'type'        =>'BY_Address_delete',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Address_delete');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['id',1,LL('need-mark address ID')],
				['uid',1,LL('need-mark user ID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//设置默认收货地址
	public function setDefault(){
		if(IS_AJAX){
			$data = [
				'id'          => input('post.id',''),
				'uid'         => input('post.uid',''),
				'api_ver'     => $this->api_ver,
				'type'        =>'BY_Address_setDefault',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Address_setDefault');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['id',142,LL('need-mark address ID')],
				['uid',82,LL('need-mark user ID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//获取默认收货地址
	public function getDefault(){
		if(IS_AJAX){
			$data = [
				'uid'         => input('post.uid',''),
				'api_ver'     => $this->api_ver,
				'type'        =>'BY_Address_getDefault',
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Address_getDefault');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['uid',82,LL('need-mark user ID')],
			]);
			return $this->fetch('ava/test');
		}
	}

	//获取单个收货地址
	public function getInfo(){
		if(IS_AJAX){
			$data = [
				'uid'         => input('post.uid',''),
				'id'          => input('post.id',''),
				'api_ver'     => $this->api_ver,
				'type'        =>'BY_Address_getInfo',
			];
			$service = new BoyeService();
			$result  = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Address_getInfo');
			$this->assign('field',[
				['api_ver',$this->api_ver,LL('need-mark api version')],
				['uid',81,LL('need-mark user ID')],
				['id',11,LL('need-mark address ID')],
			]);
			return $this->fetch('ava/test');
		}
	}
}