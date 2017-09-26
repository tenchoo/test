<?php
/**
 * Created by PhpStorm.
 * User: Zhoujinda
 * Date: 2016/9/28
 * Time: 10:59
 */

namespace app\test\controller;

use app\extend\BoyeService;
use app\system\model\SecurityCode;
use app\system\model\UcenterMember;

class TestDemo extends Ava{
    //测试API
    public function index() {
        $type = 'BY_Test_testApi';

        // $s = new SecurityCode();

        //$d = SecurityCode::create(['code'=>123456,'accepter'=>'1234','endtime'=>NOW_TIME,'ip'=>'1312','client_id'=>'12321','status'=>0,'type'=>1]);

        //$result = $s -> create(['code'=>123456,'accepter'=>'1234','endtime'=>NOW_TIME,'ip'=>'1312','client_id'=>'12321','status'=>0,'type'=>1]);
        //echo $result->id;

//
//        $data = [
//            'username' => 'bytest5',
//            'password' => '123456',
//            'email' => 'ere@134.com',
//            'mobile' => '18768121124',
//            'update_time'=>NOW_TIME,
//            'reg_from' => 0,
//        ];
//
//
//        $s = new UcenterMember();
//
//        $result = $s->validate('system/UcenterMember')->save($data);
//        dump($result);
//        //dump($s->validate(true)->getError());
//        dump($s->getError());
//        dump($s->getData());  //获取插入数据
        //dump($s->validate(true)->getError());


//
//        $s->save(['status'=>1],['accepter'=>'18768125386','code'=>'908865']);

        if (IS_AJAX) {
            $data = array(
                'name'    => input('name', ''),
                'psw'     => input('psw', ''),
                'api_ver' => $this->api_ver,
                'type'    => $type
            );

            $service = new BoyeService();
            $result = $service->callRemote("", $data, true);
            $this->parseResult($result);
        } else {
            $this->assign('type', $type);
            $this->assign('code_type', 4);//验证码类型
            $this->assign('field', [
                ['api_ver', $this->api_ver, LL('need-mark api version')],
                ['name', 'xiao', LL('need-mark user ID')],
                ['psw', '123456', LL('need-mark password')],
            ]);
            echo $this->fetch('ava/test');
        }
    }
}