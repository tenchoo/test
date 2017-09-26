<?php
/**
 * Created by PhpStorm.
 * User: Zhoujinda
 * Date: 2016/11/8
 * Time: 9:53
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Wallet extends Ava{

    //修改支付密码
    public function updatePsw(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_updatePsw',
            ];
            $filter = [
                ['uid'],
                ['old_psw'],
                ['new_psw']
            ];

            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_updatePsw');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['old_psw','123456',LL('old_psw')],
                ['new_psw','123456',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //判断旧支付密码是否正确
    public function checkPsw(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_checkPsw',
            ];
            $filter = [
                ['uid'],
                ['psw']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_checkPsw');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['psw','123456',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //钱包余额
    public function balance(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_balance',
            ];
            $filter = [
                ['uid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_balance');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //获取银行卡号银行
    public function getBank(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_getBank',
            ];
            $filter = [
                ['bank_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_getBank');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['bank_no','',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }


    //绑定银行卡
    public function bindBankCard(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_bindBankCard',
            ];
            $filter = [
                ['uid'],
                ['bank_no'],
                ['bank_account'],
                ['bank_cert'],
                ['bank_phone'],
                ['bank_cvv'],
                ['bank_yxq']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_checkPsw');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['bank_no','',LL('need-mark')],
                ['bank_account','',LL('need-mark')],
                ['bank_cert','',LL('need-mark')],
                ['bank_phone','',LL('need-mark')],
                ['bank_cvv','',''],
                ['bank_yxq','','']
            ]);
            return $this->fetch('ava/test');
        }

    }

    //已绑定的银行卡列表
    public function bankCardList(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_bankCardList',
            ];
            $filter = [
                ['uid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_bankCardList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //银行卡解绑
    public function deleteBankCard(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_deleteBankCard',
            ];
            $filter = [
                ['uid'],
                ['bank_no']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_deleteBankCard');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['bank_no','',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //提现申请
    public function withdraw(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_withdraw',
            ];
            $filter = [
                ['uid'],
                ['money'],
                ['account_id']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_withdraw');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['money','',LL('need-mark')],
                ['account_id','',LL('need-mark')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //提现申请
    public function transfer(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Wallet_transfer',
            ];
            $filter = [
                ['uid'],
                ['to_account'],
                ['balance'],
                ['trans_type'],
                ['extra']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Wallet_transfer');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','8',LL('need-mark')],
                ['to_account','18768125386',LL('need-mark')],
                ['balance','1000',LL('need-mark')],
                ['trans_type','1',LL('need-mark')],
                ['extra','','']
            ]);
            return $this->fetch('ava/test');
        }

    }
}