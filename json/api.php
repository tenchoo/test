<?php
/**
 * Author      : rainbow <hzboye010@163>
 * DateTime    : 2017-05-03 16:14:29
 * Description : [Description]
 */
header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$type = isset($_GET['type']) ? $_GET['type'] :'list';

if($type=='list'){ //查询列表

  $page = max((isset($_GET['p']) ? intval($_GET['p']) :1),1);
  $size = max((isset($_GET['s']) ? intval($_GET['s']) :10),1);
  $start = ($page-1)*$size;
  $r = query('select id,uid,contactname,mobile,detailinfo from itboye_address limit '.$start.','.$size,'select');
  $list = $r;
  $r = query('select count(id) as count from itboye_address','select',true);
  $count = $r[0]['count'];
  // $pages = ceil($count/$size);
  ajaxReturn(['count'=>$count,'list'=>$list],true);

}elseif($type == 'edit'){ //编辑

  $post = $_POST;
  // ajaxReturn($post,true);
  if(isset($post['id'])){
    $id = $post['id'];
    $detail = $post['detailinfo'];
    $r = query('update itboye_address set detailinfo="'.$detail.'" where id='.$id,'update',true);
    ajaxReturn('操作成功',true);
  }

}elseif($type == "del"){ //删除

}else{

  ajaxReturn('未知操作');
}

function query($sql='',$type='',$close=false){
  $db = db();
  // 针对成功的 SELECT、SHOW、DESCRIBE 或 EXPLAIN 查询，将返回一个 mysqli_result 对象。针对其他成功的查询，将返回 TRUE。如果失败，则返回 FALSE。
  $r = $db->query($sql);
  if(!$r){
    echo "sql语句错误<br/>";
    echo "error:".$db->error."|".$sql;
    exit;
  }
  if($type == 'select'){
    $r = getData($r);
  }elseif($type=='update'){
    $r = $db->affected_rows;
  }elseif($type=='delete'){
    $r = $db->affected_rows;
  }elseif($type=='insert'){
    $r = $mysqli->insert_id;
  }
  if($close) $db->close();
  return $r;
}
function getData($r){
  $arr = [];
  while($re = mysqli_fetch_array($r,MYSQLI_ASSOC)){
    //数字数组MYSQLI_NUM,关联数组MYSQLI_ASSOC
    $arr[] = $re;
  }
  // 释放结果集
  mysqli_free_result($r);
  return $arr;
}
function db(){
  $db = new mysqli("localhost", "root", "1", "itboye_sunsun");
  if ($db->connect_errno) {
      printf("Connect failed: %s\n", $db->connect_error);
      $db = null;
      exit;
  }
  return $db;
}
function ajaxReturn($data,$bool=false){
  if($bool){ //success
    echo json_encode(['state'=>1,'info'=>$data]);
  }else{ //error
    if(!is_string($data)) $data = 'data:参数错误';
    echo json_encode(['state'=>0,'info'=>$data]);
  }
  exit();
}