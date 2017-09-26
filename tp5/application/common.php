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


//db_object to array
function Obj2Arr($r,$key=false){
  $l = [];
  foreach ($r as $v) {
    $data = $v->getData();
    if($key) $l[$data[$key]] = $data;
    else $l[] = $data;
  }
  return $l;
}

function getAvatar($uid,$size=120){
  return config('avatar_url').'?id='.$uid.'&size='.$size;
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

/**
 * 放到utils中，作为工具类
 * @brief 干掉emoji
 * @autho chenjinya@baidu.com
 * @param {String} $strText
 * @return {String} removeEmoji
 **/
function escapeEmoji($strText, $bool = false) {
  $preg = '/\\\ud([8-9a-f][0-9a-z]{2})/i';
  if ($bool == true) {
    $boolPregRes = (preg_match($preg, json_encode($strText, true)));
    return $boolPregRes;
  } else {
    $strPregRes = (preg_replace($preg, '', json_encode($strText, true)));
    $strRet = json_decode($strPregRes, JSON_OBJECT_AS_ARRAY);

    if ( is_string($strRet) && strlen($strRet) == 0) {
        return "";
    }

    return $strRet;
  }
}

// 账号密码加密
function think_ucenter_md5($str, $key = 'UCenter'){
  return '' === $str ? '' : md5(sha1($str) . $key);
}

function addLog(){

}
/**
 * 自定义语言变量
 * @param $str  字符串
 * @param $dif  分割符
 * @param $add  链接符
 * @return string is8n字符串
 * add by zhouhou
 */
function LL($str='',$dif=' ',$add = ''){
    return implode($add,array_map('lang',explode($dif, trim($str))));
}
/**
 * lang() alias 方法别名
 * @param [type] $name [description]
 * @param array  $vars [description]
 * @param string $lang [description]
 */
function L($name, $vars = [], $lang = ''){
  return lang($name, $vars, $lang);
}
/**
 * 缺少参数函数别名
 * @Author
 * @DateTime 2016-12-13T10:20:27+0800
 * @param    [type]                   $name [description]
 */
function Llack($name,$throw=false){
  $r = lang('lack_parameter',["param"=>$name]);
  if($throw){
    throw new \InvalidArgumentException($r);
  }
  return $r;
}
function Linvalid($name,$throw=false){
  $r = lang('invalid_parameter',["param"=>$name]);
  if($throw){
    throw new \InvalidArgumentException($r);
  }
  return $r;
}
function returnErr($msg,$trans=false){
  if($trans) \think\Db::rollback();
  return ['status'=>false,'info'=>$msg];
}
function returnSuc($data){
  return ['status'=>true,'info'=>$data];
}