<?php

function _get($v,$df=''){
  return isset($_GET[$v]) ? $_GET[$v] : $df;
}
function ajaxReturn($msg,$url='',$data = [],$time=0,$flag=false){
  $r = [];
  $r['code']  = intval((Boolean) $flag); // 1:success,0:error
  $r['data']  = $data;
  $r['msg']   = $msg ? $msg : ('操作'.($r['status'] ? '成功':'失败'));
  $r['url']   = $url;  //跳转地址
  $r['delay'] = $time; //跳转延时
  echo json_encode($r);
}
// 失败 有跳转则不延时
function returnErr($msg,$url=''){
  ajaxReTurn($msg,$url,[],0,false);
}
// 成功 有跳转则延时
function returnSuc($msg,$url='',$data=[],$time=1500){
  ajaxReTurn($msg,$url,$data,$time,true);
}

$id = _get('id',0);
// returnErr('that is not ok ! ');
returnSuc('that\'s ok ! ');