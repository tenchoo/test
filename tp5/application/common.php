<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 生成假数据对象列表
 * eg:
 * $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
 * getFaker($map,rand(1,5));
 * return faker object list
 */
require '../extend/faker/autoload.php';
function getFaker(array $rules,$count=1){
  // vendor('faker.autoload');
  $faker = \Faker\Factory::create('zh_CN');
  $r = [];
  for ($i=0; $i < $count; $i++) {
    $map = [];
    foreach ($rules as $k => $v) {
      $map[$k] = call_user_func_array([$faker,$v[0]], $v[1]);
    }
    $r[] = $map;
  }
  return $r;
}

// ajax 返回
function ajaxReturn($msg,$url='',$data = [],$count=0,$time=0,$code=0){
  $r = [];
  $r['code']  = intval($code); // 0:success,1+:error_code
  $r['msg']   = $msg ? $msg : ('操作'.($r['code'] ? '失败':'成功'));
  $r['url']   = $url;  //跳转地址
  $r['delay'] = $time; //跳转延时
  $r['count'] = $count; //layui 列表数据有效
  $r['data']  = $data;
  return json($r);
}
// ajax 返回失败 有跳转则不延时
function ajaxReturnErr($msg,$url='',$code=1){
  return ajaxReTurn($msg,$url,[],0,0,$code);
}
// ajax 返回成功 有跳转则延时
function ajaxReturnSuc($msg,$url='',$data=[],$count=0,$time=1500){
  return ajaxReTurn($msg,$url,$data,$count,$time);
}
