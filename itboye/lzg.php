<?php
/**
 * 易微听 api test
 * @var string
 */
require "./function.php";
// $remote  = 'http://api.ewelisten.itboye.com/public/index.php'; //无效
error_reporting(E_ERROR | E_PARSE);

$debug = false;
$local = 'http://lzg/index.php';

//用户登陆
$api_ver = 104;
$type    = 'By_User_login';
$data    = [
  'country' => '',
  'role' => '',
  'username' => '',
];

$r = get_api();
exit;