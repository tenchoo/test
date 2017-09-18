<?php
require_once('lib/array.php');
require_once('lib/special.php');
require_once('lib/view.php');

function _get($v,$df=''){
  return isset($_GET[$v]) ? $_GET[$v] : $df;
}

//
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
function ajaxReturnErr($msg,$url=''){
  ajaxReTurn($msg,$url,[],0,false);
}
// 成功 有跳转则延时
function ajaxReturnSuc($msg,$url='',$data=[],$time=1500){
  ajaxReTurn($msg,$url,$data,$time,true);
}
/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}
/**
 * 返回数据状态的含义
 * @status $status 一个数字 -1,0,1,2,3 其它值都是未知
 * @return 描述字符串
 */
function getStatus($status) {
  $desc = '未知状态';
  switch(intval($status)) {
    case -1 :
        $desc = "已删除";
        break;
    case 0 :
        $desc = "禁用";
        break;
    case 1 :
        $desc = "正常";
        break;
    case 2 :
        $desc = "待审核";
        break;
    case 3 :
        $desc = "通过";
        break;
    case 4 :
        $desc = "不通过";
        break;
    default :
        break;
  }
  return $desc;
}

//缓存键名
function getCacheKey($map=null,$pre='g'){
  $key = '_'.serialize($map);
  return $pre.$key;
}


/**
 * @desc  im:十进制数转换成三十六机制数
 * @param (int)$num 十进制数
 * @return bool|string
 */
function get_36HEX($num) {
  $num = intval($num);
  if ($num <= 0) return 0;
  $charArr = array("0","1","2","3","4","5","6","7","8","9",'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
  $char = '';
  do {
    $key = ($num - 1) % 36;
    $char= $charArr[$key] . $char;
    $num = floor(($num - $key) / 36);
  } while ($num > 0);
  return $char;
}
// ----------------- tp  --------------------------------

/**
 * 记录日志，系统运行过程中可能产生的日志
 * Level取值如下：
 * EMERG 严重错误，导致系统崩溃无法使用
 * ALERT 警戒性错误， 必须被立即修改的错误
 * CRIT 临界值错误， 超过临界值的错误
 * WARN 警告性错误， 需要发出警告的错误
 * ERR 一般性错误
 * NOTICE 通知，程序可以运行但是还不够完美的错误
 * INFO 信息，程序输出信息
 * DEBUG 调试，用于调试信息
 * SQL SQL语句，该级别只在调试模式开启时有效
 */
function LogRecord($msg, $location, $level = 'ERR') {
    \think\Log::write($location . $msg, $level);
}
/**
 * 接口日志记录
 * @param $api_uri
 * @param $get
 * @param $post
 * @param $notes
 * @param bool $onlyDebug
 * @throws \think\Exception
 */
function addLog($api_uri,$get,$post,$notes,$onlyDebug=false,$from='',$content=''){
  if($onlyDebug && config('app_debug') == false){
    return ;
  }

  is_array($get) &&  $get = json_encode($get);
  is_array($post) && $post = json_encode($post);
  $post    = is_null($post)  ? "null":$post;
  $get     = is_null($get)   ? "null":$get;
  $notes   = is_null($notes) ? "null":$notes;
  $api_uri = empty($api_uri) ? "":$api_uri;

  db('ApiCallHis')->insert([
    'api_uri'        =>$api_uri,
    'call_get_args'  =>$get,
    'call_post_args' =>$post,
    "call_input"     =>$content,
    'notes'          =>$notes,
    'call_time'      =>NOW_TIME,
    'call_from'      =>$from,
  ]);

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
function L($name, $vars = [], $lang = '')
{
    return \think\Lang::get($name, $vars, $lang);
}
/**
 * 缺少参数函数别名
 * @Author
 * @DateTime 2016-12-13T10:20:27+0800
 * @param    [type]                   $name [description]
 */
function Llack($name){
    return lang('lack_parameter',["param"=>$name]);;
}
function Linvalid($name,$throw=false){
  $msg = lang('invalid_parameter',["param"=>$name]);
  if($throw){
    throw new \Exception(Linvalid("group_id"), \app\src\base\enum\ErrorCode::Invalid_Parameter);
  }
  return $msg;
}
function returnErr($msg,$trans=false){
  if($trans) \think\Db::rollback();
  return ['status'=>false,'info'=>$msg];
}
function returnSuc($data){
  return ['status'=>true,'info'=>$data];
}

function getNickname($uid=0){
  $r = sdb('common_member','')->where('uid',$uid)->field('nickname')->find();
  if(empty($r)) return '';
  return $r['nickname'];
}
/**
 * 获取图片地址
 * @param $id
 * @param int $size
 * @return string
 */
function getImgUrl($id,$size=0){
  return config('picture_url').$id.($size  ? '&size='.$size:'');
}