<?php
/**
 * 易微听 api test
 * @var string
 */
require "./function.php";
// $remote  = 'http://api.ewelisten.itboye.com/public/index.php'; //无效
error_reporting(E_ERROR | E_PARSE);

$debug   = false;
$local   = 'http://cqb/index.php';

//调查问卷 - 答题
// $api_ver = 100;
// $type    = 'By_Suggest_surveySubmit';
// $data    = [
//   'answer' => '{"6205":[6206,6207]}'
// ];

$r = get_api();
exit;