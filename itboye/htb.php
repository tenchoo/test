<?php
/**
 * 虎头奔 api test
 * @var string
 */
require "./function.php";
// $remote  = 'http://api.hutouben.itboye.com/public/index.php'; //无效
error_reporting(E_ERROR | E_PARSE);

$debug = false;
$local = 'http://hutou.api/public/index.php';

// 论坛首页
// $api_ver = 100;
// $type    = 'By_Bbs_index';
// $data    = [
//  'uid'=>'',
// ];

// 论坛帖子列表
// $api_ver = 100;
// $type    = 'By_Bbs_listPost';
// $data    = [
//  'uid'   =>'',
//  'page'  =>2,
//  // 'size'  =>10,
//  // 'kword' =>'',
// ];

// 论坛帖子点赞
// $api_ver = 100;
// $type    = 'By_Bbs_like';
// $data    = [
//  'uid'=>1,
//  'pid'=>2,
//  'rid'=>0,
// ];

// 论坛帖子举报
// $api_ver = 100;
// $type    = 'By_Bbs_report';
// $data    = [
//  'uid'=>1,
//  'pid'=>1,
//  'rid'=>0,
//  'reason'=>'xxx',
// ];

// 论坛 - 我的帖子
// $api_ver = 100;
// $type    = 'By_Bbs_myPost';
// $data    = [
//  'uid'  =>1,
//  'page' =>1,
//  'size' =>10
// ];

// 用户 - 信息修改
// $api_ver = 100;
// $type    = 'By_User_update';
// $data    = [
//  'uid'  =>1,
//  'nickname' =>'itboyekkj',
// ];

// 论坛 - 签到详情
// $api_ver = 100;
// $type    = 'By_Bbs_signDetail';
// $data    = [
//  'uid'  =>1,
// ];

// 论坛 - 签到
// $api_ver = 100;
// $type    = 'By_Bbs_sign';
// $data    = [
//  'uid'  =>1,
// ];

// 首页
// $api_ver = 100;
// $type    = 'By_Index_index';
// $data    = [
// ];

// 论坛详情
// $api_ver = 100;
// $type    = 'By_Bbs_detail';
// $data    = [
//   'id' =>4,
//   'uid'=>'',
// ];

// 论坛发帖
// $api_ver = 100;
// $type    = 'By_Bbs_addPost';
// $data    = [
//   'uid'         =>39,
//   'app'         =>'test',
//   'title'       =>'api add ---sddssdd post',
//   'content'     =>'codeing...',
//   'img'         =>'1',
//   'reply_limit' =>1,
//   'top'         =>1,
// ];

// 论坛转发
// $api_ver = 100;
// $type    = 'By_Bbs_repeat';
// $data    = [
//   'uid'         =>1,
//   'app'         =>'test',
//   'content'     =>'ok ...',
//   'reply_limit' =>0,
//   'repeat_id'   =>1,
// ];

// 论坛回复列表
// $api_ver = 100;
// $type    = 'By_Bbs_listReply';
// $data    = [
//   'uid'  =>1,
//   'pid'  =>1,
//   'rid'  =>0,
//   'page' =>1,
//   'size' =>10,
// ];

// 论坛 回复
// $api_ver = 100;
// $type    = 'By_Bbs_addReply';
// $data    = [
//   'uid'     =>1,
//   'pid'     =>4,
//   'rid'     =>0,
//   'to_uid'  =>0,
//   'app'     =>'test',
//   'img'     =>'',
//   'content' =>'replydddd ...',
// ];

// 订单 - 取消
// $api_ver = 101;
// $type    = 'By_Order_cancel';
// $data = [
//   's_id'       =>'itboye',
//   'uid'        =>39,
//   'order_code' =>'T17205085602218229402',
// ];

// 商品 - 立即购买
// $api_ver = 102;
// $type    = 'By_Order_createNow';
// $data    = [
//   's_id'       =>'itboye',
//   'uid'        =>39,
//   'sku_pkid'   =>'713',
//   'count'      =>'1',
//   'address_id' =>284,
//   'note'       =>'备注',
//   'score'      =>50,
// ];

// 微信 - 预支付
// $api_ver = 100;
// $type    = 'By_Wxpay_prePay';
// $data    = [
//   'pay_code'=>'WX163561533568875476V',//PA1635615280173426951',//'WX163561533568875476V'
// ];

// 提现 - 银行卡类型信息
// $api_ver = 100;
// $type    = 'By_Wallet_getBank';
// $data    = [
//   'bank_no'=>'6212261208003010288',
// ];

// 余额 - 支付
// $api_ver = 100;
// $type    = 'By_Wallet_pay';
// $data    = [
//   // 'uid'     =>32,
//   // 'pay_code'=>'WX163561533568875476V'
//   'uid'     =>39,
//   'pay_code'=>'PA17206150308667623302',
// ];

// 全部技能 - 查看
// $api_ver = 100;
// $type    = 'By_Worker_skill';
// $data    = [
//   'uid'=>38
// ];

// 版本检查
// $api_ver = 100;
// $type    = 'By_Config_version';
// $data    = [
//   'app_type'=>'ios',
// ];

// 余额 - 提现账号列表
// $api_ver = 100;
// $type    = 'By_Wallet_bindList';
// $data    = [
//   'uid' =>38,
// ];

// 余额 - 删除提现账号
// $api_ver = 100;
// $type    = 'By_Wallet_bindDel';
// $data    = [
//   'uid' =>38,
//   'id'  =>1,
// ];

// 余额 - 充值订单支付信息
// $api_ver = 100;
// $type    = 'By_Wallet_charge';
// $data    = [
//   'uid'   =>38,
//   'money' =>1,
// ];

// 余额 - 绑定提现账号
// $api_ver = 100;
// $type    = 'By_Wallet_bind';
// $data    = [
//   'uid' =>38,
//   'account' =>'6212261208003010288',
//   'account_type' =>6197,
// ];

// 钱包 - 查询
// $api_ver = 100;
// $type    = 'By_Wallet_detail';
// $data    = [
//   'uid' =>38
// ];

// 维修 - 列表查询
// $api_ver = 101;
// $type    = 'By_Repair_queryList';
// $data    = [
//   'uid'           =>32,
//   'group_id'      =>6,
//   'repair_status' =>'',
//   'current_page'  =>1,
//   'per_page'      =>10,
// ];

// 维修 - 可接列表查询
// $api_ver = 102;
// $type    = 'By_Repair_query';
// $data    = [
//   'uid'          =>38,
//   'current_page' =>1,
//   'per_page'     =>10,
//   'order'        =>1,
//   'group_id'     =>6,
//   'lng'          =>120,
//   'lat'          =>30,
// ];

// 维修 - 支付/重支付
// $api_ver = 100;
// $type    = 'By_Repair_pay';
// $data    = [
//   'uid'   =>38,
//   'id'    =>9,
//   'score' =>6604,
// ];

// 维修 - 取消支付
// $api_ver = 100;
// $type    = 'By_Repair_unPay';
// $data    = [
//   'uid'   =>38,
//   'id'    =>9,
// ];

// 维修 - 真删除(未接单)
// $api_ver = 100;
// $type    = 'By_Repair_del';
// $data    = [
//   'uid'   =>32,
//   'id'    =>5,
// ];

// 维修中 - 查看
// $api_ver = 100;
// $type    = 'By_Repair_setPrice';
// $data    = [
//   'uid'   =>38,
//   'id'    =>5,
//   'price' =>6600,
// ];

// 维修中 - 查看
// $api_ver = 100;
// $type    = 'By_Repair_current';
// $data    = [
//   'uid'     =>29,
//   'group_id'=>6,
// ];

// 维修 - 接单
// $api_ver = 100;
// $type    = 'By_Repair_take';
// $data    = [
//   'uid'=>38,
//   'id' =>5,
// ];

// 维修 - 报修
// $api_ver = 100;
// $type    = 'By_Repair_add';
// $data    = [
//   'uid'=>31,
//   'address' =>5,
//   'mobile'=>'17195862186',
//   'detail'=>'ddd',
//   'vehicle_type'=>6171,
//   'repair_type' =>6175,
//   'images'=>'1,fff,3',
//   'city'=>'330100',
//   'area'=>'330104',
//   'lng'=>120,
//   'lat'=>232
// ];

// 维修 - 待维修列表
// $api_ver = 101;
// $type    = 'By_Repair_query';
// $data    = [
//   'uid'=>38,
//   'current_page'=>1,
//   'per_page'=>10,
//   'order'=>1,
//   'lng'=>120,
//   'city'=>'',
//   'lat'=>30,
// ];

// 技工技能 - set
// $api_ver = 100;
// $type    = 'By_Worker_setSkill';
// $data    = [
//   'uid'       => 38,
//   'skill_ids' => '6176',
// ];

// 司机认证申请 - verify
// $api_ver = 100;
// $type    = 'By_Driver_verify';
// $data    = [
//   'id'    => 7,
//   'op_id' => 1, //1通过,2驳回+真删除,-1假删除,-2真删除
//   'msg'   => 'not-pass',//驳回信息
// ];

// 司机认证申请 - list
// $api_ver = 100;
// $type    = 'By_Driver_applyList';
// $data    = [
//   'kword'        =>'',
//   'order'        =>'',
//   'current_page' =>1,
//   'per_page'     =>10,
//   'uid'          =>38,
// ];

// 司机认证申请 - add
// $api_ver = 100;
// $type    = 'By_Driver_apply';
// $data    = [
//   'uid'         => '38',
//   'id_number'   => '123456',
//   'realname'    => '真实',
//   'id_certs'    => '1,2',
//   'driver_cert' => 3,
// ];

//技工认证申请 - verify
// $api_ver = 100;
// $type    = 'By_Worker_verify';
// $data    = [
//   'id'    => 9,
//   'op_id' => 1, //1通过,2驳回+真删除,-1假删除,-2真删除
//   'msg'   => 'not-pass',//驳回信息
// ];

// 技工认证申请 - list
// $api_ver = 100;
// $type    = 'By_Worker_applyList';
// $data    = [
//   'kword'        =>'',
//   'order'        =>'',
//   'current_page' => 1,
//   'status'       =>1,
//   'per_page'     =>10,
// ];

// 技工认证申请 - add
// $api_ver = 100;
// $type    = 'By_Worker_apply';
// $data    = [
//   'uid'         => '38',
//   'id_number'   => '123456',
//   'realname'    => '真实',
//   'id_certs'    => '1,2',
// ];

//购物车 - 添加
// $api_ver = 102;
// $type    = 'By_ShoppingCart_query';
// $data    = [
//   'uid'  =>19
// ];

//购物车 - 添加
// $api_ver = 100;
// $type    = 'By_ShoppingCart_bulkAdd';
// $data    = [
//   'uid'      =>19,
//   'id'       =>8,
//   'sku_pkid' =>'2',
//   'count'    =>5,
// ];

//商品 - detail
// $api_ver = 102;
// $type    = 'By_Product_detail';
// $data    = [
//   'id'   => '11'
// ];

//商品 - search
$api_ver = 101;
$type    = 'By_Product_search';
$data    = [
  'cate_id'   => 3
];

//维修 - 获取依赖
// $api_ver = 100;
// $type    = 'By_Repair_rely';
// $data    = [];

//维修 - 申请
// $api_ver = 100;
// $type    = 'By_Repair_add';
// $data    = [
//   'uid'          => '32',
//   'mobile'       => '17195862186',
//   'detail'       => '哈雷调河里了',
//   'address'      => '杭州下沙智慧谷',
//   'vehicle_type' => 6171,
//   'repair_type'  => 6175,
//   'images'       => '1,2',
//   'city'         =>'330100',
//   'area'         =>'330104',
//   'lng'          => 0,
//   'lat'          => 0,
// ];

//用户登陆
// $api_ver = 104;
// $type    = 'By_User_login';
// $data    = [
//   'role'        => 'role_driver',
//   'device_token'=> 'device_id_um',
//   'device_type' => 'ios',
//   'country'     => '+86',
//   'username'    => '17195862186',
//   'password'    => '123456',
// ];

// 用户注册 - 司机
// $api_ver = 102;
// $type    = 'By_User_register';
// $data    = [
//   'code'        => 'itboye',
//   'country'     => '+86',
//   'username'    => '17681876089',
//   'password'    => '123456',
//   'from'        => '0',
//   'idcode'      => '',
// ];

// 用户注册 - 技工
// $api_ver = 100;
// $type    = 'By_User_workerReg';
// $data    = [
//   'mobile' => 'itboye',
//   'idcode' => '1448',
// ];

$r = get_api();
exit;