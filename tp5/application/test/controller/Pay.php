<?php
/**
 * @Author   : rainbow
 * @Email    : hzboye010@163.com
 * @DateTime : 2016-11-07 09:52:09
 * @Description : [支付 或 余额 测试类]
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Pay extends Ava{
	//获取支付信息 废弃
	public function getPayInfo(){
		if(IS_POST){
			$data = [
				'api_ver' =>$this->api_ver,
				'type'    =>'BY_Pay_getPayInfo',
				'uid'     =>input('post.uid',''),
				'order_code' =>input('post.order_code',''),
				'wallet'     =>input('post.wallet',''),
				'third_party'=>input('post.third_party',''),
			];
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_Pay_getPayInfo');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['uid',97,LL('need-mark UID')],
				['order_code','HO2016110217972',LL('need-mark UID')],
				['wallet',0,L('wallet_money')],
				['third_party',1,LL('need-mark third_party_type')],
			]);
			return $this->fetch('ava/test');
		}

	}

	//发起支付
	public function payInfo(){
		if(IS_AJAX){
			$data = [
				'api_ver' => $this->api_ver,
				'type'    => 'BY_Pay_payInfo',
			];
			$filter = [
				['uid'],
				['pay_code_type'],
				['items'],
				['pay_type'],
				['wallet_pay_money'],
				['wallet_only',0],
				['amount']
			];

			$data = array_merge($data, $this->getPostParams($filter));
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			$this->parseResult($result);
		}else{
			$this->assign('type','BY_Pay_payInfo');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['uid',11,LL('need-mark')],
				['pay_code_type','loan',LL('need-mark')],
				['items',1,LL('need-mark')],
				['pay_type',6325,LL('need-mark')],
				['wallet_pay_money',10100,''],
				['wallet_only',1,''],
				['amount',0,'']
			]);
			return $this->fetch('ava/test');
		}
	}

	//发起rf支付
	public function rfpay(){
		if(IS_AJAX){
			$data = [
				'api_ver' => $this->api_ver,
				'type'    => 'BY_Pay_rfpay',
			];
			$filter = [
				['uid'],
				['pay_code'],
				['bank_id']
			];

			$data = array_merge($data, $this->getPostParams($filter));
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			$this->parseResult($result);
		}else{
			$this->assign('type','BY_Pay_rfpay');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['uid','97',LL('need-mark')],
				['pay_code','WRXXXXX',LL('need-mark')],
				['bank_id','7',LL('need-mark')]
			]);
			return $this->fetch('ava/test');
		}
	}

	//rf支付发送验证码
	public function rfpaySendSms(){
		if(IS_AJAX){
			$data = [
				'api_ver' => $this->api_ver,
				'type'    => 'BY_Pay_rfpaySendSms',
			];
			$filter = [
				['order_no'],
				['sms_code']
			];

			$data = array_merge($data, $this->getPostParams($filter));
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			$this->parseResult($result);
		}else{
			$this->assign('type','BY_Pay_rfpaySendSms');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['order_no','1313197',LL('need-mark')],
				['sms_code','12321',LL('need-mark')],
			]);
			return $this->fetch('ava/test');
		}
	}
}