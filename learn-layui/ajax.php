<?php

function _get($v,$df=''){
  return isset($_GET[$v]) ? $_GET[$v] : $df;
}
function ajaxReturn($msg,$url='',$data = [],$count=0,$time=0,$code=0){
  $r = [];
  $r['code']  = intval($code); // 0:success,1+:error_code
  $r['msg']   = $msg ? $msg : ('操作'.($r['status'] ? '成功':'失败'));
  $r['url']   = $url;  //跳转地址
  $r['delay'] = $time; //跳转延时
  $r['count'] = $count; //layui 列表数据有效
  $r['data']  = $data;
  echo json_encode($r);
}
// 失败 有跳转则不延时
function returnErr($msg,$url='',$code=1){
  ajaxReTurn($msg,$url,[],0,0,$code);
}
// 成功 有跳转则延时
function returnSuc($msg,$url='',$data=[],$count=0,$time=1500){
  ajaxReTurn($msg,$url,$data,$count,$time);
}

$id = intval(_get('id',0));
$op = _get('op','');
$page = max(intval(_get('page',1)),1); // page
$size = max(intval(_get('size',10)),1);// size
if($op == 'login'){

}elseif($op == 'logout'){

}elseif($op == 'user'){
  $start = ($page-1)*$size + 10000;
  $users = [];
  $count = 1000;
  for ($i=0; $i < $size; $i++) {
    $users[] = [
      'id'=>$start+$i,
      'username'=>'user-'.$i,
      'sex'=>"女",
      'city'=>'城市-'.$i,
      'sign'=>'签名-'.$i,
      'logins'=>mt_rand(0,1000),
      'score'=>mt_rand(0,100),
    ];
  }
  returnSuc("ok","",$users,$count);
}else{
  returnErr('that is not ok ! ');
  // returnSuc('that\'s ok ! ');
}