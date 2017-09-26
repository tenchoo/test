<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Code Test 验证码测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Message extends Ava{
    //发送短信
    public function sendUserSms() {
        if (IS_AJAX) {
            $data = $this->getPost('BY_Message_sendUserSms','uid,sms_type,para1,para2');
            $service = new BoyeService();
            $result  = $service->callRemote("", $data,false);
            return $this->parseResult($result);
        } else {
            $this->assign('type', 'BY_Message_sendUserSms');
            $this->assign('field', [
                ['api_ver', $this->api_ver, LL('need-mark api version')],
                ['uid', 366, LL('need-mark user ID')],
                ['sms_type', '', ''],
                ['para1', '', ''],
                ['para2', '', ''],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //最近联系人 - 云旺私聊
    public function ywRelation() {
        if (IS_AJAX) {
            $data = $this->getPost('BY_Message_ywRelation','uid,begin,end');
            $service = new BoyeService();
            $result  = $service->callRemote("", $data,false);
            return $this->parseResult($result);
        } else {
            $this->assign('type', 'BY_Message_ywRelation');
            $this->assign('field', [
                ['api_ver', $this->api_ver, LL('need-mark api version')],
                ['uid', 97, LL('need-mark user ID')],
                ['begin', date('Ymd',strtotime('-1 week')), L('degin_date')],
                ['end', date('Ymd'), L('end_date')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //云旺私聊
    public function ywPush() {
        if (IS_AJAX) {
            $data = $this->getPost('BY_Message_ywPush','uid,to_uid,msg,push');
            $service = new BoyeService();
            $result  = $service->callRemote("", $data, false);
            return $this->parseResult($result);
        } else {
            $this->assign('type', 'BY_Message_ywPush');
            $this->assign('field', [
                ['api_ver', $this->api_ver, LL('need-mark api version')],
                ['uid', 97, LL('need-mark user_ID')],
                ['to_uid', 98, LL('need-mark to_user_ID')],
                ['msg', 'emoj123', LL('need-mark message')],
                ['push', 0, LL('need-mark if_push')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //云旺私聊历史
    public function ywHis() {
        if (IS_AJAX) {
            $data = $this->getPost('BY_Message_ywHis','uid,to_uid,begin,end,count,next');
            $service = new BoyeService();
            $result  = $service->callRemote("", $data, false);
            return $this->parseResult($result);
        } else {
            $diff = diffUtc();
            $this->assign('type', 'BY_Message_ywHis');
            $this->assign('field', [
                ['api_ver', $this->api_ver, LL('need-mark api version')],
                ['uid', 11, LL('need-mark user ID')],
                ['to_uid', 71, LL('need-mark user ID')],
                ['begin', strtotime('-1 week')-diffUtc(), L('degin_date')],
                ['end', time()-diffUtc(), L('end_date')],
                ['count', 10, L('count')],
                ['next', '', L('next')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    //发送系统消息
    public function system(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_system','uid,msg,push');
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_system');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['uid',0,LL('need-mark to user ID ，0:全体用户')],
                ['msg','hi',LL('need-mark message-content')],
                ['push', 1, LL('need-mark if_push')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    // 已读信息 修改status
    public function read(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_read','uid,id');
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_read');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['uid',42,LL('need-mark user ID')],
                ['id',1,LL('need-mark call user ID')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    // 删除信息 修改status
    public function delete(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_delete','ids');//uid
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_delete');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                // ['uid',42,LL('need-mark user ID')],
                ['ids',1,LL('need-mark msg-ids')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    // //发送私信
    // public function call(){
    //     if(IS_AJAX){
    //         $data = [
    //             'uid'       =>input('post.uid'),
    //             'to_uid'    =>input('post.to_uid'),
    //             'message'   =>input('post.message'),
    //             'api_ver'   =>$this->api_ver,
    //             'type'      =>'BY_Message_call',
    //         ];
    //         $service = new BoyeService();
    //         $result  = $service->callRemote("",$data,false);
    //         return $this->parseResult($result);
    //     }else{
    //         $this->assign('type','BY_Message_call');
    //         $this->assign('field',[
    //             ['api_ver','100',LL('need-mark api version')],
    //             ['uid',42,LL('need-mark user ID')],
    //             ['to_uid',50,LL('need-mark call user ID')],
    //             ['message','',L('message')]
    //         ]);
    //         return $this->fetch('ava/test');
    //     }
    // }
    //发送短信息
    public function sendSms(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_send_sms','mobile,code_type');
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_send_sms');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['mobile','17195862186',LL('need-mark phone-number')],
                ['code_type','1',LL('need-mark code-type')],
            ]);
            return $this->fetch('ava/test');
        }
    }

    public function checkCode(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_checkCode','mobile,code,code_type');
            $service = new BoyeService();
            $result  = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_checkCode');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['mobile','17195862186',LL('need-mark phone-number')],
                ['code_type','1',LL('need-mark code-type')],
                ['code','1',LL('need-mark validate-code')],
            ]);
            return $this->fetch('ava/test');
        }
    }
    // 私信消息分页查询
    // public function queryCall(){
    //     if(IS_AJAX){
    //         $data = [
    //             'uid'        =>input('post.uid',''),
    //             'start_time' =>input('post.start_time',''),
    //             'page_no'    =>input('post.page_no',1),
    //             'page_size'  =>input('post.page_size',10),
    //             'api_ver'    =>$this->api_ver,
    //             'type'       =>'BY_Message_queryCall',
    //         ];

    //         $service = new BoyeService();
    //         $result= $service->callRemote("",$data,false);
    //         return $this->parseResult($result);
    //     }else{
    //         $this->assign('type','BY_Message_queryCall');
    //         $this->assign('field',[
    //             ['api_ver','100',LL('need-mark api version')],
    //             ['uid',25,LL('need-mark user ID')],
    //             ['start_time','',LL('start time')],
    //             ['page_no',1,L('page')],
    //             ['page_size',10,LL('page size')]
    //         ]);
    //         return $this->fetch('ava/test');
    //     }
    // }
    // // 2人间私信删除
    // public function deleteCall(){
    //     if(IS_AJAX){
    //         $data = [
    //             'curr_uid'  =>input('post.curr_uid',''),
    //             'rela_uid'  =>input('post.rela_uid',''),
    //             'api_ver'   =>$this->api_ver,
    //             'type'      =>'BY_Message_deleteCall',
    //         ];

    //         $service = new BoyeService();
    //         $result= $service->callRemote("",$data,false);
    //         return $this->parseResult($result);
    //     }else{
    //         $this->assign('type','BY_Message_deleteCall');
    //         $this->assign('field',[
    //             ['api_ver','100',LL('need-mark api version')],
    //             ['curr_uid',50,LL('need-mark current user ID')],
    //             ['rela_uid',42,LL('need-mark relation user ID')],
    //         ]);
    //         return $this->fetch('ava/test');
    //     }
    // }
    // // 私信详情分页查询
    // public function detailCall(){
    //     if(IS_AJAX){
    //         $data = [
    //             'curr_uid'   =>input('post.curr_uid',''),
    //             'rela_uid'   =>input('post.rela_uid',''),
    //             'start_time' =>input('post.start_time',''),
    //             'page_no'    =>input('post.page_no',1),
    //             'page_size'  =>input('post.page_size',10),
    //             'api_ver'    =>$this->api_ver,
    //             'type'       =>'BY_Message_detailCall',
    //         ];

    //         $service = new BoyeService();
    //         $result= $service->callRemote("",$data,false);
    //         return $this->parseResult($result);
    //     }else{
    //         $this->assign('type','BY_Message_detailCall');
    //         $this->assign('field',[
    //             ['api_ver','100',LL('need-mark api version')],
    //             ['curr_uid',50,LL('need-mark current user ID')],
    //             ['rela_uid',42,LL('need-mark relation user ID')],
    //             ['start_time','',LL('start time')],
    //             ['page_no',1,L('page')],
    //             ['page_size',10,LL('page size')]
    //         ]);
    //         return $this->fetch('ava/test');
    //     }
    // }
    //消息分页查询
    public function query(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_query','uid,msg_type,start_time,page_no,page_size');
            $service = new BoyeService();
            $result= $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_query');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['uid',25,LL('need-mark user ID')],
                ['msg_type',1,LL('need-mark msg-type')],
                //'start_time','',LL('start time')],
                ['page_no',1,L('page')],
                ['page_size',10,LL('page size')]
            ]);
            return $this->fetch('ava/test');
        }
    }


    //查看未读消息数量
    public function count(){
        if(IS_AJAX){
            $data = $this->getPost('BY_Message_count','uid');
            $service = new BoyeService();
            $result= $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Message_count');
            $this->assign('field',[
                ['api_ver','100',LL('need-mark api version')],
                ['uid',25,LL('need-mark user ID')],

            ]);
            return $this->fetch('ava/test');
        }
    }




}