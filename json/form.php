<?php
/**
 * Author      : rainbow <hzboye010@163>
 * DateTime    : 2017-05-03 16:14:29
 * Description : [Description]
 */
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with,content-type');

var_dump($_GET);
var_dump($_POST);
// echo $_GET['id'];
// echo $_POST['date1'];
// echo json_encode($_POST);
// echo json_encode(['code'=>1,'data'=>['a'=>1,'b'=>2]]);
return ;