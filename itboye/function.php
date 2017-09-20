<?php

// usage
// $remote  = 'http://xxx/public/index.php'; //无效
error_reporting(E_ERROR | E_PARSE);
// $debug   = false;
// $local   = 'http://ewt.my/public/index.php';
//用户登陆
// $api_ver = 104;
// $type    = 'By_User_login';
// $data    = [
//   'role'        => 'role_driver',
//   'device_token'=> 'device_id_um',
//   'device_type' => 'ios',
//   'country'     => '+86',
//   'username'    => '17195862186',
//   'password'    => '123456',
// ];
// $r = get_api();
// exit;

function get_api($url='',$client='test',$alg='md5_v2'){

  global $local,$debug;
  $url = $url ? $url : $local;
  $client = set_client($client);

  $post = [];
  $post['alg']       = $alg;
  $post['client_id'] = $client['client_id'];
  $post['itboye']    = build_data($client,$alg);

  $r = post_curl($url,$post);
  $r['info'] = str_replace('=&gt;', '=>', $r['info']);

dump('返回解密');
dump(decryptData($r['info']['data']));

dump('接口返回');
dump($r);
  return $r;
}

function decryptData($encryptData=''){
  // if($client_scrent){
  //   return openssl_decrypt(base64_decode($encryptData),"des-ecb", $client_scrent);
  // }else{
    //md5_v2
    return json_decode(base64_decode(base64_decode($encryptData)),JSON_OBJECT_AS_ARRAY);
  // }
}


function encryptData(array $data){
    $str = json_encode($data,0, 512);
    return base64_encode(base64_encode($str));
}
function sign(array $data){
  $str = $data['time'].$data['type'].$data['data'].$data['client_scrent'].$data['notify_id'];
  return md5($str);
}
function check_sign(array $data){
  return true;
}
function build_data($client='',$alg='md5_v2'){
  global $type,$data,$api_ver;
  $data['client_id'] = $client['client_id'];
dump('业务数据 - '.$type);
dump($data);
  $post = [];
  $post['notify_id'] = time();
  $post['time']      = time();
  $post['data']      = encryptData($data);
  $post['type']      = $type;
  $post['api_ver']   = $api_ver;
  $post['client_id'] = $client['client_id'];
  $post['client_scrent'] = $client['client_scrent']; //签名用
  //签名
  $post['sign'] = sign($post);
  unset($post['client_scrent']);
$debug && dump('业务数据 - 封装(签名加密)');
$debug && dump($post);
  //加密
  $data = des_encode(json_encode($post),$client['client_scrent'],$alg);
  $data = base64_encode($data);
// dump('业务数据 - 加密');
// dump($data);
  return $data;
}

function post_curl($url='', array $data) {
  $ch     = curl_init();
  $header = ['Accept-Charset'=>"utf-8"];
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.64 Safari/537.36'); //chrome46/mac
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $tmpInfo = curl_exec($ch);
  $errorno = curl_errno($ch);
  if($errorno){
      return ['status' => false, 'info' => $errorno];
  }else{

      $js = json_decode($tmpInfo,true);
      if(is_null($js)){
          $js = "$tmpInfo";
      }
      return ['status' => true, 'info' => $js];
  }
}


function set_client($mark='test'){
  $r = [];
  if($mark=='test'){
    $r['client_id']     = 'by58018f50cfcae1';
    $r['client_scrent'] = 'cb0bfaf5b9b2f53a216bf518e18fef18';
  }
  return $r;
}


/**
 * 浏览器友好的变量输出
 * @param mixed         $var 变量
 * @param boolean       $echo 是否输出 默认为true 如果为false 则返回输出字符串
 * @param string        $label 标签 默认为空
 * @param integer       $flags htmlspecialchars flags
 * @return void|string
 */
function dump($var, $echo = true, $label = null, $flags = ENT_SUBSTITUTE){
  if(is_string($var) || is_numeric($var)){
    if($echo){
      echo '<br/>'.$var.'<br/>';
    }else{
      return $var;
    }
  }else{
    $label = (null === $label) ? '' : rtrim($label) . ':';
    ob_start();
    var_export($var);
    $output = ob_get_clean();
    $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
    // if (IS_CLI) {
    //     $output = PHP_EOL . $label . $output . PHP_EOL;
    // } else {
        if (!extension_loaded('xdebug')) {
            $output = htmlspecialchars($output, $flags);
        }
        $output = '<pre>' . $label . $output . '</pre>';
    // }
    if ($echo) {
        echo ($output);
        return null;
    } else {
        return $output;
    }
  }
}

function des_encode($content,$key,$alg='md5_v2'){
  if($alg=='md5_v3'){
    return openssl_encrypt($content ,"des-ecb", $key);
  }else{
    $td   = \mcrypt_module_open(MCRYPT_DES,'','ecb',''); //使用MCRYPT_DES算法,ecb模式
    $size = mcrypt_enc_get_iv_size($td);//设置初始向量的大小
    $iv   = mcrypt_create_iv($size, MCRYPT_RAND);//创建初始向量

    $ks = mcrypt_enc_get_key_size($td);//返回所支持的最大的密钥长度（以字节计算）
    // echo "<br/>".$ks;
    $key = substr($key,0,$ks);
    // echo "<br/>".$key;
    mcrypt_generic_init($td, $key, $iv); //初始处理

    //要保存到明文
    //加密
    $encode = mcrypt_generic($td, $content);

    //结束处理
    mcrypt_generic_deinit($td);
    return $encode;
  }
}
