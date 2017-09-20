<?php
/**
 * 易微听 api test
 * @var string
 */
require "./function.php";
// $local  = 'http://api.ewelisten.com/public/index.php'; //无效
// error_reporting(E_ERROR | E_PARSE);

$debug   = false;
$local   = 'http://ewt.my/index.php';

//消息推送/发送
// $api_ver = 100;
// $type    = 'By_Message_push';
// $data    = [
//   'uid'      => '-1', //171
//   'to_uids'  =>'17,32d1', //-1 -2 171,170
//   'msg_type' =>'6042',
//   'title'    =>'title',
//   'summary'  =>'',
//   'content'  =>'content',
//   'extra'    =>'',
//   'push'     =>0,
//   'record'   =>1,
// ];

//调查问卷 - 答题
// $api_ver = 100;
// $type    = 'By_Suggest_surveySubmit';
// $data    = [
//   'answer' => '{"6205":[6206,6207]}'
// ];

//订单 - repay
// $api_ver = 101;
// $type    = 'By_Order_repay';
// $data    = [
//   's_id'       =>'itboye',
//   'uid'        =>171,
//   'order_code' => 'T177815415590687143Q',
// ];
// 'pay_money' => '3000',
// 'pay_code' => 'PA177817075768480583Q',
// 'create_time' => '1489995715',
// 'sign' => '8b09f2042e17e07c1a40a0a13df0e7e6',

// 订单 - 模拟支付 - 支付宝
// $api_ver = 100;
// $type = 'By_Alipay_simulator';
// $data = [
//   'pay_money'=>1,
//   'pay_code' => 'PA1787135555828310041',
// ];

//订单 - cancel
// $api_ver = 101;
// $type    = 'By_Order_cancel';
// $data    = [
//   's_id'       =>'itboye',
//   'uid'        =>171,
//   'order_code' => 'T177815511845183503Q',
// ];

//订单 - list
// $api_ver = 101;
// $type    = 'By_Order_query';
// $data    = [
//   's_id'         =>'itboye',
//   'uid'          =>171,
//   'keyword'      =>'',
//   'query_status' =>0,
//   'page_index'   =>1,
//   'page_size'    =>10,
// ];

//调查问卷 - 查询
// $api_ver = 100;
// $type    = 'By_Suggest_survey';
// $data    = [];

//商品立即购买
// $api_ver = 100;
// $type    = 'By_Order_createNowEachOne';
// $data    = [
//   's_id'     =>'itboye',
//   'uid'      =>171,
//   'sku_pkid' =>20,
//   'idcode'   =>'149I',
//   'note'     =>''
// ];

//商品详情
// $api_ver = 100;
// $type    = 'By_Product_detail';
// $data    = [
//   'id'  =>8,
//   'uid' =>171
// ];

// 首页
$api_ver = 101;
$type    = 'By_Index_index';
$data    = [
  'size'=>10
];

// 修改用户邮箱
// $api_ver = 100;
// $type    = 'By_User_changeEmail';
// $data    = [
//   'email'     => '977746076@qq.com',
//   'new_email' => '977746075@qq.com',
//   'code'      => 'itboye',
// ];

// 修改用户资料
// $api_ver = 100;
// $type    = 'By_User_update';
// $data    = [
  // 's_id'        =>'dd4a757ca5e1e8cf915b6fe96b75b5533Q',
  // 'uid'         =>171,
  // 'loc_school'  =>2,
  // 'loc_area'    =>'中国 浙江 杭州',
  // 'loc_country' =>1,
  // 'grade_code'  =>'00P003001',
  // 'nickname'    =>'博也测试-rainbow',
  // 'sex'         =>1,
  // 'head'        =>2, //系统头像id
  // 'sign'        =>'微芒耀世',
// ];

// 获取用户dtree
// $api_ver = 100;
// $type    = 'By_User_getDtree';
// $data    = [];

// 获取学校
// $api_ver = 100;
// $type    = 'By_User_getSchool';
// $data    = [
//   'area_id'=>'330106'
// ];


// 验证验证码
// $api_ver = 100;
// $type    = 'By_SecurityCode_check';
// $data    = [
//   'acceptor'  => '977746075@qq.com',
//   'code' => '299571',
//   'code_type'=>2,
// ];

// 发送验证码
// $api_ver = 100;
// $type    = 'By_SecurityCode_create';
// $data    = [
//   'acceptor'  => '977746075@qq.com',
//   'code_type' => '2',
// ];

// 用户注册
// $api_ver = 100;
// $type    = 'By_User_register';
// $data    = [
//   'username' => '977746075@qq.com',
//   'mobile'   => '17195862186',
//   'code'     => '788997',
//   'password' => '123456',
// ];

// 用户登陆
// $api_ver = 100;
// $type    = 'By_User_login';
// $data    = [
//   'username'     =>'977746075@qq.com',
//   'password'     =>'123456',
//   'device_type'  =>'unknown',
//   'device_token' =>'device_id_um',
//   'device_model' =>'mi4c',
// ];

// 更换手机
// $api_ver = 100;
// $type    = 'By_User_changeMobile';
// $data    = [
//   's_id'       =>'itboye',
//   'uid'        =>'171',
//   'mobile'     =>'17195862186',
//   'mobile_new' =>'17788889999',
// ];

// 用户设备 - 解绑
// $api_ver = 100;
// $type    = 'By_LoginDevice_unbind';
// $data    = [
//   'uid' =>171,
//   // 's_id' =>'itboye',
//   'device_token'=>'',
// ];

// 用户设备 - 列表
// $api_ver = 101;
// $type    = 'By_LoginDevice_bindList';
// $data    = [
//   'uid' =>171,
// ];

// 修改密码 - 邮箱
// $api_ver = 100;
// $type    = 'By_User_updatePwd';
// $data    = [
//   'email'    => '977746075@qq.com',
//   'code'     => '806510',
//   'password' => '123456',
// ];

// 修改密码 - 密码
// $api_ver = 100;
// $type    = 'By_User_updatePwdByOldPwd';
// $data    = [
//   'uid'      => '171',
//   's_id'     => 'itboye',
//   'password'     => '654321',
//   'new_password' => '123456',
// ];

//题目详情 - test
// $api_ver = 100;
// $type    = 'By_Question_test';
// $data    = [
//   'dt_type'=> '8',
// ];

//题目列表 - search
// $api_ver = 101;
// $type    = 'By_Product_search';
// $data    = [
//   'keyword'=> '',
//   'cate_id'=> 0,
//   'prop_id'=> 0,
//   'page_index'=> 1,
//   'page_size'=> 10,
//   'order'=>'',
//   'l_price'=>0,
//   'r_price'=>0,
//   'uid'=>0,
// ];

//我的书籍 - 列表
// $api_ver = 100;
// $type    = 'By_Product_myBooks';
// $data    = [
//   'uid'=>171,
//   'kword'=> '',
//   'cate_id'=> 0,
//   'page_index'=> 1,
//   'page_size'=> 10,
// ];

//试卷 - 列表
// $api_ver = 100;
// $type    = 'By_Paper_query';
// $data    = [
//   'uid'=>171,
//   'cate_id'=> 0,
//   'page_index'=> 1,
//   'page_size'=> 10,
// ];

//试卷 - 详情
// $api_ver = 100;
// $type    = 'By_Paper_detail';
// $data    = [
//   'uid'=>171,
//   'id'=> 1, //1/2
// ];

//单元详情
// $api_ver = 101;
// $type    = 'By_Question_unitDetail';
// $data    = [
//   'uid'=>184,
//   'unit_id'=> 9,
//   's_id'=> 'itboye',
// ];

// 单元答题 - 答案
// $api_ver = 100;
// $type    = 'By_Question_submitNoAnswer';
// $data    = [
//   'uid'          =>170,
//   'unit_id'      =>9,
//   's_id'         =>'itboye',
//   'use_time'     =>180,
//   'answer_multi' =>'1:0,4:1,7:2,56:0,57:1,58:2,1:1',
// ];

//单元答题 - 列表
// $api_ver = 100;
// $type    = 'By_Question_doneList';
// $data    = [
//   'uid'         =>170,
//   'answer_type' =>1,  //0,1
//   'book_id'     =>0,  //1/2
//   'unit_id'     =>0,  //2/2
//   'order'       =>0,  //0,1
//   'current_page'=>1,
//   'page_size'   =>10,
// ];

//单元答题 - 列表
// $api_ver = 100;
// $type    = 'By_Question_preSearch';
// $data    = [
//   'uid'     =>170,
//   'book_id' =>0,  //1/2
//   'kword'   =>'', //书籍名关键词
// ];

//单元答题 - 答题概览
// $api_ver = 101;
// $type    = 'By_Question_submitDetail';
// $data    = [
//   'uid'     =>170,
//   'unit_id' =>45,
// ];

//单元答题 - 删除
// $api_ver = 100;
// $type    = 'By_Question_submitUnitDel';
// $data    = [
//   'uid'=>171,
//   'id' =>22,
// ];

$r = get_api('','test','md5_v3');
exit;