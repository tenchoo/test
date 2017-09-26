<?php
/**
 * @Author   : rainbow
 * @Email    : hzboye010@163.com
 * @DateTime : 2016-10-26 18:16:56
 * @Description : 智能锁v2接口 测试类
 */
namespace app\test\controller;
use app\extend\BoyeService;

class Sciener extends Ava{

	//获取openid
	public function getOpenId(){
		if(IS_AJAX){
			$data = $this->getPost('BY_ScienerV3_getOpenId','uid');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','BY_ScienerV3_getOpenId');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['uid',11,LL('need-mark uid')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//锁密码列表 - admin
	public function viewPwd(){
		if(IS_AJAX){
			$data = $this->getPost('AM_ScienerV3_viewPwd','aid,lock_id,kword,order,per_page,current_page');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_ScienerV3_viewPwd');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['lock_id','',L('lock_id')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','send_time desc',L('order')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//锁钥匙列表 - admin
	public function viewKey(){
		if(IS_AJAX){
			$data = $this->getPost('AM_ScienerV3_viewKey','aid,lock_id,kword,order,per_page,current_page');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_ScienerV3_viewKey');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['lock_id','',L('lock_id')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','create_time desc',L('order')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//锁列表 - admin
	public function view(){
		if(IS_AJAX){
			$data = $this->getPost('AM_ScienerV3_view','aid,kword,order,per_page,current_page,uid,house_no');
			$service = new BoyeService();
			$result = $service->callRemote("",$data,false);
			return $this->parseResult($result);
		}else{
			$this->assign('type','AM_ScienerV3_view');
			$this->assign('field',[
				['api_ver',100,LL('need-mark api version')],
				['aid',11,LL('need-mark aid')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','create_time desc',L('order')],
				['uid',0,L('uid')],
				['house_no','',L('house_no')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//锁用户列表 - admin
	public function listUser(){
		if (IS_AJAX) {
			$data = $this->getPost('AM_ScienerV3_listUser','lock_id,kword,order,per_page,current_page');
			$data = [
				'type'    => 'AM_ScienerV3_listUser',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'AM_ScienerV3_listUser');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				// ['uid',130, LL('need-mark UID')],
				['lock_id','sciener_30013', LL('need-mark lock-id')],
				['kword','',L('key_word')],
				['current_page',1,L('current_page')],
				['per_page',10,L('per_page')],
				['order','send_time desc',L('order')],
			]);
			return $this->fetch('ava/test');
		}
	}


	//删除备份钥匙 - 废弃
	public function deleteBackup(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_Sciener_deleteBackup',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'key_id'  => input('post.key_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_Sciener_deleteBackup');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',71, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['key_id','sciener_208841', LL('need-mark key_id')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//备份钥匙 - 废弃
	public function backupKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_Sciener_backupKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'key_id'  => input('post.key_id', ''),
				'admin_ps'  => input('post.admin_ps', ''),
				'nokey_ps'  => input('post.nokey_ps', ''),
				'delete_ps' => input('post.delete_ps', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_Sciener_backupKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',71, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['key_id','sciener_208841', LL('need-mark key_id')],
				['admin_ps','', LL('need-mark admin_ps')],
				['nokey_ps','', LL('need-mark nokey_ps')],
				['delete_ps','', LL('need-mark delete_ps')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//备份钥匙列表 - 废弃
	public function listBackup(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_Sciener_listBackup',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_Sciener_listBackup');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',71, LL('need-mark operator_UID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//下载备份钥匙 - 废弃
	public function downBackup(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_Sciener_downBackup',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'key_id'  => input('post.key_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_Sciener_downBackup');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',71, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['key_id','sciener_208841', LL('need-mark key_id')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 下载钥匙 - 废弃
	public function downKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_Sciener_downKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
				'lock_id' => input('post.lock_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_Sciener_downKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['key_id','sciener_208841', LL('need-mark keyID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//智能锁解绑管理员 - 废弃
	public function unbindAdmin(){
		// if (IS_AJAX) {
		//     $data = [
		//         'type'    => 'BY_Sciener_unbindAdmin',
		//         'api_ver' => $this->api_ver,
		//         'uid'     => input('post.uid', ''),
		//         'lock_id' => input('post.lock_id', ''),
		//         'key_id'  => input('post.key_id', ''),
		//     ];

		//     $service = new BoyeService();
		//     $result  = $service->callRemote("", $data, false);
		//     return $this->parseResult($result);

		// } else {
		//     $this->assign('type', 'BY_Sciener_unbindAdmin');
		//     $this->assign('field', [
		//         ['api_ver', 100, LL('need-mark api version')],
		//         ['uid', 130, LL('need-mark UID')],
		//         ['lock_id', 0, LL('need-mark lockID')],
		//         ['key_id', 0, LL('need-mark keyID')],
		//     ]);
		//     return $this->fetch('ava/test');
		// }
	}


	//重置用户键盘密码 - ok
	public function resetKeyboardPwd(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_resetKeyboardPwd',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'pwd_info'  => input('post.pwd_info', ''),
				'timestamp' => input('post.timestamp', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_resetKeyboardPwd');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['pwd_info',1, LL('need-mark pwd_info')],
				['timestamp',20, LL('need-mark timestamp')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//发送键盘密码 - ok
	public function getKeyboardPwd(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_getKeyboardPwd',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'pwd_type'=> input('post.pwd_type', ''),
				'to_phone'=> input('post.to_phone', ''),
				'start'   => input('post.start', ''),
				'end'     => input('post.end', ''),
				'date'    => input('post.date', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_getKeyboardPwd');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['pwd_type',1, LL('need-mark password_type')],
				['to_phone','', L('ihome_reg_phone')],
				['start',0, LL('need-mark start_date')],
				['end',0, LL('need-mark end_date')],
				['date',time(), LL('need-mark 手机时间戳')],

			]);
			return $this->fetch('ava/test');
		}
	}
	//*蓝牙删除键盘密码 - ok
	public function deleteKeyboardPwd(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_deleteKeyboardPwd',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'keyboard_id' => input('post.keyboard_id', '')
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_deleteKeyboardPwd');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['keyboard_id',0, LL('need-mark keyboard_id')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//自定义键盘密码 - ok
	public function addKeyboardPwd(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_addKeyboardPwd',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'pwd' 		=> input('post.pwd', ''),
				'to_phone'=> input('post.to_phone', ''),
				'start'   => input('post.start', ''),
				'end' 		=> input('post.end', '')
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_addKeyboardPwd');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['pwd','', LL('need-mark pwd')],
				['to_phone','', L('ihome_reg_phone')],
				['start','', LL('need-mark start')],
				['end','', LL('need-mark end')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//修改键盘密码 - ok
	public function changeKeyboardPwd(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_changeKeyboardPwd',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'keyboard_id'=> input('post.keyboard_id', ''),
				'pwd' 		=> input('post.pwd', ''),
				'start'   => input('post.start', ''),
				'end' 		=> input('post.end', '')
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_changeKeyboardPwd');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_', LL('need-mark lockID')],
				['keyboard_id','', LL('need-mark keyboard_id')],
				['pwd','', LL('1/2 pwd')],
				['start','', LL('2/2 start')],
				['end','', LL('2/2 end')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//键盘密码的发送记录 - 本地 - ok
	public function listKeyboardLog(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_listKeyboardLog',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'current_page' => input('post.current_page', ''),
				'per_page' => input('post.per_page', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_listKeyboardLog');
			$this->assign('field', [
				['api_ver', 101, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['current_page',1, LL('need-mark current_page')],
				['per_page',20, LL('need-mark per_page')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//获取键盘密码版本 - ok
	public function getKeyboardPwdVersion(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_getKeyboardPwdVersion',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_getKeyboardPwdVersion');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
			]);
			return $this->fetch('ava/test');
		}
	}


	//锁的钥匙列表 - ok
	public function listKey(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_listKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_listKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark UID')],
				['lock_id','sciener_29677', LL('need-mark lock-id')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//* 重置普通钥匙 - ok
	public function resetAllKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_resetAllKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_resetAllKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 解冻钥匙 - ok
	public function unlockKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_unlockKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_unlockKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['key_id','sciener_209471', LL('need-mark keyID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 冻结钥匙 - ok
	public function lockKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_lockKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_lockKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['key_id','sciener_208841', LL('need-mark keyID')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 删除钥匙 - ok
	public function deleteKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_deleteKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
				'lock_id' => input('post.lock_id', ''),
				'auth_out' => input('post.auth_out', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_deleteKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['key_id','sciener_208841', LL('need-mark keyID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['auth_out',0, '是1否0同时删除授权,授权用户钥匙有效'],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 同步用户钥匙 - ok
	public function syncUserKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_syncUserKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'last_update_time'  => input('post.last_update_time', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_syncUserKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['last_update_time',0, LL('need-mark 上次同步时间')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 删除普通钥匙 - ok
	public function deleteAllKey(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_deleteAllKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
				'lock_id' => input('post.lock_id', ''),
				'auth_out' => input('post.auth_out', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_deleteAllKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['key_id','sciener_208841', LL('need-mark keyID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['auth_out',0, '是1否0同时删除授权,授权用户钥匙有效'],
			]);
			return $this->fetch('ava/test');
		}
	}
	//用户钥匙列表 - ok
	public function listUserKey(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_listUserKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'kword'   => input('post.kword', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_listUserKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',130, LL('need-mark UID')],
				['kword','', L('search_word')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//发送钥匙 - ok
	public function sendKey(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_sendKey',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'to_mobile'=> input('post.to_mobile', ''),
				'lock_id' => input('post.lock_id', ''),
				'start'   => input('post.start', ''),
				'end'     => input('post.end', ''),
				'mark'    => input('post.mark', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_sendKey');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark UID')],
				['to_mobile',15238599999, LL('need-mark receiver_mobile')],
				['lock_id','sciener_29677', LL('need-mark lock-id')],
				['start',0, LL('need-mark start_date')],
				['end',0, LL('need-mark end_date')],
				['mark','', LL('need-mark remark')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//修改钥匙 有效期 - ok
	public function changePeriod(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_changePeriod',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'key_id'  => input('post.key_id', ''),
				'lock_id' => input('post.lock_id', ''),
				'start'   => input('post.start', ''),
				'end'     => input('post.end', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_changePeriod');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',369, LL('need-mark UID')],
				['key_id','sciener_', LL('need-mark key_id')],
				['lock_id','sciener_', LL('need-mark lock-id')],
				['start',0, LL('need-mark start_date')],
				['end',0, LL('need-mark end_date')],
			]);
			return $this->fetch('ava/test');
		}
	}



	//锁低电量 -ok
	public function lowPower(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_lowPower',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'power'   => input('post.power', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_lowPower');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lockID')],
				['power',10, LL('need-mark power')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//*上传开锁记录 - ok
	public function unlock(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_unlock',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'records' => input('post.records', ''),
				'success' => input('post.success', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_unlock');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lock_id')],
				['records','', LL('need-mark records')],
				['success',1, LL('need-mark success')],
			]);
			return $this->fetch('ava/test');
		}
	}
	// 是否推送 - ok
	public function ifPush(){
		if(IS_AJAX){
			$data = [
				'type'    => 'BY_ScienerV3_ifPush',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'push' 		=> input('post.push', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);
		} else {
			$this->assign('type', 'BY_ScienerV3_ifPush');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',71, LL('need-mark operator_UID')],
				['lock_id','sciener_29677', LL('need-mark lock_id')],
				['push',0, LL('need-mark push')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//锁授权与取消 - ok
	public function auth(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_auth',
				'api_ver' => $this->api_ver,
				'uid'     => input('post.uid', ''),
				'to_uid'  => input('post.to_uid', ''),
				'lock_id' => input('post.lock_id', ''),
				'auth'    => input('post.auth', ''),
				'start'   => input('post.start', ''),
				'end'     => input('post.end', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_auth');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',130, LL('need-mark UID')],
				['to_uid',11, LL('need-mark UID')],
				['lock_id','sciener_30013', LL('need-mark lock-id')],
				['auth',1, LL('need-mark if_auth')],
				['start',0, LL('need-mark start_date')],
				['end',0, LL('need-mark end_date')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//开锁记录 - ok
	public function listRecord(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_listRecord',
				'api_ver' => $this->api_ver,
				'uid'          => input('post.uid', ''),
				'lock_id'      => input('post.lock_id', ''),
				'current_page' => input('post.current_page', ''),
				'per_page'     => input('post.per_page', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_listRecord');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',130, LL('need-mark UID')],
				['lock_id','sciener_30013', LL('need-mark lock-id')],
				['current_page',1, LL('need-mark page-number')],
				['per_page',20, LL('need-mark page-size')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//解绑房源 - ok
	public function unbindHouse(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_unbindHouse',
				'api_ver' => $this->api_ver,
				'uid'      => input('post.uid', ''),
				'lock_id'  => input('post.lock_id', ''),
				'house_no' => input('post.house_no', ''),
			];

			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_unbindHouse');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark UID')],
				['lock_id','sciener_30013', LL('need-mark lock-id')],
				['house_no','HN33010082', LL('need-mark house-code')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//绑定房源 - ok
	public function bindHouse(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_bindHouse',
				'api_ver' => $this->api_ver,
				'uid'      => input('post.uid', ''),
				'lock_id'  => input('post.lock_id', ''),
				'house_no' => input('post.house_no', ''),
			];

			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_bindHouse');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark UID')],
				['lock_id','sciener_30013', LL('need-mark lock-id')],
				['house_no','HN33010082', LL('need-mark house-code')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//绑定已有的科技侠账号 - ok
	public function bind(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_bind',
				'api_ver' => $this->api_ver,
				'uid'  => input('post.uid', 0),
				'name' => input('post.name', ''),
				'pass' => input('post.pass', ''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_bind');
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid',11, LL('need-mark UID')],
				['name','', LL('need-mark username')],
				['pass','', LL('need-mark password')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//自动注册科技侠并绑定住家 - ok
	public function reg(){
		if (IS_AJAX) {
		    $data = [
		        'type'    => 'BY_ScienerV3_reg',
		        'api_ver' => $this->api_ver,
		        'uid'     => input('post.uid', 0),
		    ];
		    $service = new BoyeService();
		    $result  = $service->callRemote("", $data, false);
		    return $this->parseResult($result);

		} else {
		    $this->assign('type', 'BY_ScienerV3_reg');
		    // $this->assign('code_type', 5);//验证码类型
		    $this->assign('field', [
		        ['api_ver', $this->api_ver, LL('need-mark api version')],
		        ['uid', 11, LL('need-mark UID')],
		    ]);
		    return $this->fetch('ava/test');
		}
	}
	//删除用户绑定的科技侠账号- ok
	public function unbind(){
		if (IS_AJAX) {
		    $data = [
		        'type'    => 'BY_ScienerV3_unbind',
		        'api_ver' => $this->api_ver,
		        'uid'     => input('post.uid', ''),
		    ];

		    $service = new BoyeService();
		    $result  = $service->callRemote("", $data, false);
		    return $this->parseResult($result);

		} else {
		    $this->assign('type', 'BY_ScienerV3_unbind');
		    // $this->assign('code_type', 5);//验证码类型
		    $this->assign('field', [
		        ['api_ver', $this->api_ver, LL('need-mark api version')],
		        ['uid', 11, LL('need-mark UID')],
		    ]);
		    return $this->fetch('ava/test');
		}
	}
	//*锁初始化 失败要重试 - ok
	public function init(){
		if (IS_AJAX) {
			$data = [
				'type'    => 'BY_ScienerV3_init',
				'api_ver' => $this->api_ver,
				'uid'         => input('post.uid', ''),
				'lock_type'   => input('post.lock_type',''),
				'lockName'    => input('post.lockName',''),
				'lockAlias'   => input('post.lockAlias',''),
				// 'quantity'    => input('post.quantity',''),
				'lockMac'     => input('post.lockMac',''),
				'lockKey'     => input('post.lockKey',''),
				'lockFlagPos' => input('post.lockFlagPos',''),
				'aesKeyStr'   => input('post.aesKeyStr',''),
				'lockVersion' => input('post.lockVersion',''),
				'adminPwd'     => input('post.adminPwd',''),
				'noKeyPwd'     => input('post.noKeyPwd',''),
				'deletePwd'    => input('post.deletePwd',''),
				'pwdInfo'      => input('post.pwdInfo',''),
				'timestamp'    => input('post.timestamp',''),
				'specialValue' => input('post.specialValue',''),
			];
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
			$this->assign('type', 'BY_ScienerV3_init');
	    // $this->assign('logs', true);
			$this->assign('field', [
				['api_ver', $this->api_ver, LL('need-mark api version')],
				['uid', 71, LL('need-mark UID')],
				['lock_type', 6323, LL('need-mark lock-type')],
				['lockName', 'S202_e6485b', LL('need-mark lockName')],
				['lockAlias', 'S202_e6485b', LL('need-mark lockAlias')],
				// ['quantity', '100.000000', LL('need-mark quantity')],
				['lockMac', 'CA:AF:04:5B:48:E6', LL('need-mark lockMac')],
				['lockKey', 'MTI0LDEyNCwxMjUsMT<br/>IxLDExNiwxMjAsMTI1LD<br/>EyNCwxMjUsMTI1LDUw', LL('need-mark lockKey')],
				['lockFlagPos', 0, LL('need-mark lockFlagPos')],
				['aesKeyStr', 'fb,49,9a,54,2d,78,40,c8,<br/>b2,a0,a4,f8,9b,15,26,95', LL('need-mark aesKeyStr')],
				['lockVersion[protocolVersion]', '3',LL('need-mark lockVersion-protocolVersion')],
				['lockVersion[protocolType]', '5',LL('need-mark lockVersion-protocolType')],
				['lockVersion[orgId]', '1',LL('need-mark lockVersion-orgid')],
				['lockVersion[scene]', '2',LL('need-mark lockVersion-scene')],
				['lockVersion[groupId]', '1',LL('need-mark lockVersion-groupid')],
				['adminPwd', '', LL('need-mark sdk返回的adminPwd')],
				['noKeyPwd', '', LL('need-mark sdk返回的noKeyPwd')],
				['deletePwd', '', LL('need-mark sdk返回的deletePwd')],
				['pwdInfo', '', LL('need-mark sdk返回的pwdInfo')],
				['timestamp', '', LL('need-mark sdk返回的timestamp')],
				['specialValue', '', LL('need-mark sdk返回的feature')],
			]);
			return $this->fetch('ava/test');
		}
	}
	//用户的智能锁 - ok
	public function lock(){
		if (IS_AJAX) {
			$data = $this->getPost('BY_ScienerV3_lock','uid,house_no,remote,kword,current_page,per_page,order');
			$service = new BoyeService();
			$result  = $service->callRemote("", $data, false);
			return $this->parseResult($result);

		} else {
		    $this->assign('type', 'BY_ScienerV3_lock');
		    $this->assign('field', [
		        ['api_ver', $this->api_ver, LL('need-mark api version')],
		        ['uid', 11, LL('need-mark UID')],
		        ['house_no', '', L('house-code')],
		        ['remote', 0, L('if_remote')],
						['kword','',L('key_word')],
						['current_page',1,L('current_page')],
						['per_page',10,L('per_page')],
						['order','create_time desc',L('order')],
		    ]);
		    return $this->fetch('ava/test');
		}
	}
	//修改锁信息 - ok
	public function edit(){
		if (IS_AJAX) {
		    $data = [
		        'type'    => 'BY_ScienerV3_edit',
		        'api_ver' => $this->api_ver,
						'uid'     => input('post.uid', ''),
						'lock_id' => input('post.lock_id', ''),
						'alias'   => input('post.alias', ''),
		    ];

		    $service = new BoyeService();
		    $result  = $service->callRemote("", $data, false);
		    return $this->parseResult($result);

		} else {
		    $this->assign('type', 'BY_ScienerV3_edit');
		    $this->assign('field', [
		        ['api_ver', $this->api_ver, LL('need-mark api version')],
		        ['uid', 130, LL('need-mark UID')],
		        ['lock_id', 'sciener_30013', LL('need-mark lockID')],
		        ['alias', '科技型_itboye_01', LL('need-mark alias')],
		    ]);
		    return $this->fetch('ava/test');
		}
	}
}