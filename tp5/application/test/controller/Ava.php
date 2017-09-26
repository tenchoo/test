<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * 基本测试类
 */

namespace app\test\controller;

use think\Controller;
use app\extend\BoyeService;

// use app\index\service\OAuth2ClientService;

class Ava extends Controller {
	protected $format; //return-format
	protected $api_ver; //客户端版本号
	// protected $notify_id;
	// protected $alg;
	protected $client_id = 'by571846d03009e1';
	//admin-app client_id
	protected $client_secret = '964561983083ac622f03389051f112e5';
	//admin-app client_id

	public function initialize() {
		header("X-AUTHOR:ITBOYE.COM");
		//封装为front-app
		$config = [
			'client_id'     => CLIENT_ID,
			'client_secret' => CLIENT_SECRET,
			'site_url'      => config("site_url"),
		];
		$this->format = input('format','json');
		// $client = new OAuth2ClientService($config);
		// $access_token = $client->getAccessToken();
		// if($access_token['status']){
		//   $this->assign("access_token",$access_token['info']);
		// }
		$this->assign("access_token", CLIENT_ID);
		//基本参数验证
		$this->api_ver = input('post.api_ver', 100);
		// $this->alg       = 'md5';//I('post.alg','md5');
		// $this->notify_id = time();//I('post.notify_id',time());
		// $this->assign('api_ver',I('post.api_ver',100));
		// $this->assign('alg',I('post.alg','md5'));
		// $this->assign('notify_id',I('post.notify_id',time()));
		// $this->assign("error",$access_token);
	}

	//test 实例用法
	public function test() {
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_Ava_test',
				'api_ver' => $this->api_ver,
				// 'notify_id'=> $this->notify_id,
				// 'alg'      => $this->alg,
				'msg'     => input('msg', ''),
			];

			$service = new BoyeService();
			$result = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('logs', true); //前端日志开关，可选
			$this->assign('type', 'BY_Ava_test');
			$this->assign('field', [
				['api_ver', '100', LL('api version')],
				['msg', 'name', lang('username')],
			]);
			return $this->fetch();
		}
	}
	//解析curl返回 并格式化
	protected function parseResult($result) {
		if(is_string($result)){
			exit($result);
		}elseif(is_array($result)){
			if(is_string($result['info']) && (false != strrpos($result['info'], '!DOCTYPE html') || false != strrpos($result['info'], 'Fatal error') || false != strrpos($result['info'], '系统发生错误'))){
				exit($result['info']);
			}
		}
		if($this->format == 'xml'){
			xml($result)->send();
		}else if($this->format == 'array'){
			if(!is_string($result)){
				dump($result);
			}else{
				echo $result;
			}
		}else{ //json,jsonp,...
			json($result)->send();
		}
		exit;
		// multi_dump($result, $this->format, lang('parsed-data'));
	}
	//设置test模块curl请求参数
	protected function getPost($type,$str=''){

		$r = [];
		$r['api_ver'] = $this->api_ver;
		$r['type']    = $type;
		$str = explode(',', $str);
		foreach ($str as $v) {
			$r[$v] = input($v,'');
		}
		return $r;
	}
	/**
	 * 批量获取post参数
	 * @param array $filter
	 * @return array
	 */
	protected function getPostParams($filter = []){
		$data = [];
		//['key','default','alias']
		foreach ($filter as $val){
			if(is_array($val)){
				$name = !empty($val[2]) ? $val[2] : $val[0];
				$data[$name] = !empty($val[1]) ? $val[1] : input('post.'.$val[0]);
			}else{
				$data[$val] = input('post.'.$val);
			}
		}
		return $data;
	}

}