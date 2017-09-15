<?php
/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0,$adv=false) {
  $type       =  $type ? 1 : 0;
  static $ip  =   NULL;
  if ($ip !== NULL) return $ip[$type];
  if($adv){
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
      $pos    =   array_search('unknown',$arr);
      if(false !== $pos) unset($arr[$pos]);
      $ip     =   trim($arr[0]);
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
      $ip     =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
      $ip     =   $_SERVER['REMOTE_ADDR'];
    }
  }elseif (isset($_SERVER['REMOTE_ADDR'])) {
    $ip     =   $_SERVER['REMOTE_ADDR'];
  }
  // IP地址合法验证
  $long = sprintf("%u",ip2long($ip));
  $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
  return $ip[$type];
}

// excel下载 可能中文乱码
// $sum =  count($list) ? '=sum(C3:C'.(count($list)+2).')&"元"' : '0.00元';
function  downExcel($title='',array $cell,array $data){
  $cols = count($cell);
  $table = '<table><tr> ';
  $table .= '<th colspan="'.$cols.'" align="center">'.$title.'</th></tr><tr>';
  foreach ($cell as $v) {
      $table .= "<th  align='right'>{$v}</th>";
  }
  $table .= "</tr>";
  foreach ($data as $v) {
      $table .= "<tr>";
      foreach ($v as $vv) {
          $table .= "<td align='right'>{$vv}</td>";
      }
      $table .="</tr>";
  }
  $table .= "</table>";
  //通过header头控制输出excel表格
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
  header("Content-Type:application/force-download");
  header("Content-Type:application/vnd.ms-execl;charset=utf-8"); //
  header("Content-Type:application/octet-stream");
  header("Content-Type:application/download");
  header('Content-Disposition:attachment;filename="'.$title.'.xls"');
  header("Content-Transfer-Encoding:binary");
  echo $table;exit;
}
// 百度地图api : baidu_map_ak
function getAddressPos($address=''){
  $req = 'http://api.map.baidu.com/geocoder/v2/?address='.urlencode($address).'&output=json&ak='.config('baidu_map_ak');
  $r = json_decode(file_get_contents($req),true);
  if($r['status'] !== 0){
      return returnErr(isset($r['msg']) ? '非法地址:'.$r['msg'] : $r['message']);
  }
  return returnSuc($r['result']['location']);
}
/**
 * 生成假数据对象列表
 * eg:
 * $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
 * getFaker($map,rand(1,5));
 * return faker object list
 */
//require '../vendor/faker/autoload.php';
function getFaker(array $rules,$count=1){
  vendor('faker.autoload');
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