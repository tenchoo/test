<?php
/**
 * Created by PhpStorm.
 * User: hebidu
 * Date: 15/12/3
 * Time: 11:17
 */

namespace app\extend;

use app\index\exception\ApiException;

class CryptUtils {

    /**
     * 签证签名
     * @param $sign
     * @param $data
     * @return bool
     * @throws \Exception
     */
    public static function verify_sign($sign,$data){
// echo $sign.'<br/>';
        $tmp_sign = CryptUtils::sign($data);
// echo $tmp_sign;
// halt($data);
        if($sign == $tmp_sign) return true;
        return false;
    }

    /**
     * 对数据进行解密,base64_decode 2次而已
     * @param $encrypt_data
     * @return string
     * @internal param $decrypt_data
     * @internal param $data
     */
    public static function decrypt($encrypt_data){
        return json_decode(base64_decode(base64_decode($encrypt_data)),JSON_OBJECT_AS_ARRAY);
    }

    /**
     * 对数据进行加密,base64_decode2次而已
     * @param $data
     * @return string
     */
    public static function encrypt($data){
        $str = json_encode($data);
        return base64_encode(base64_encode($str));
    }

    /**
     * 签名
     * @param $param  [client_secret,data,time,type,notify_id]
     * @return string
     * @throws \Exception
     */
    public static function sign($param){
        $client_secret = isset($param['client_secret']) ? $param['client_secret'] : '';
        $notify_id     = isset($param['notify_id'])     ? $param['notify_id']     : ''; //请求id
        $time = isset($param['time']) ? $param['time'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $data = isset($param['data']) ? $param['data'] : '';

        if(empty($client_secret)) throw new ApiException("client_secret参数非法!");
        if(empty($time)) throw new ApiException("time参数非法!");
        if(empty($type)) throw new ApiException("type参数非法!");

        if(empty($notify_id)) throw new ApiException("notify_id参数非法!");

        $text = $time.$type.$data.$client_secret.$notify_id;
        return md5($text);
    }
}