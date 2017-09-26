<?php
/**
 * 张健 hzboye013@163.com
 * addby sublime snippets
 * File Test 附件测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Rent extends Ava {

    //签约申请
    public function rent(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_rent',
                'uid'          => input('post.uid',''),
                'house_no'         => input('post.house_no','0'),
                'remark'         => input('post.remark',''),
                'starttime'     => input('post.starttime','0'),
                'endtime'     => input('post.endtime',''),
                'money'     => input('post.money',''),
                'paytype'     => input('post.paytype',''),
                'status'         => input('post.status','-1'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_rent');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',11,LL('need-mark uid')],
                ['house_no','HN3301008',LL('need-mark 房源ID')],
                ['remark','备注',LL('备注')],
                ['starttime','1477620600',LL('开始时间')],
                ['endtime','1477620600',LL('终止时间')],
                ['money','10000',LL('预计金额')],
                ['paytype','支付宝',LL('付款方式')],

                ['status','0',LL('need-mark 0:申请 2:取消申请')],
            ]);
            return $this->fetch('ava/test');
        }

    }





        //取消租房申请
    public function del(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_del',
                'uid'          => input('post.uid',''),
                'house_no'         => input('post.house_no','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_del');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',11,LL('need-mark uid')],
                ['house_no','HN3301008',LL('need-mark 房源编码')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //查询租房列表
    public function query(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_query',
                'uid'          => input('post.uid',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_query');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',11,LL('need-mark uid')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //房东查看房源签约申请列表
    public function rentapply(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type' => 'BY_Rent_rentapply',
                'house_no' => input('house_no'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);

            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_rentapply');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['house_no','HN3301008',LL('need-mark 房源编号')]
            ]);
            return $this->fetch('ava/test');
        }

    }





    //房东确认租房申请
    public function select(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_select',
                'house_no'          => input('post.house_no',''),
                'uid'          => input('post.uid',''),
                'owner_uid'          => input('post.owner_uid',''),
                'status'          => input('post.status','1'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_select');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['house_no','HN3301008',LL('need-mark house')],
                ['uid',13,LL('need-mark 房客ID')],
                ['owner_uid',13,LL('need-mark 房东ID')],
                ['status',1,LL('need-mark 1：通过申请 2：作废申请')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //看房申请及取消看房申请
    public function rentview(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_rentview',
                'uid'          => input('post.uid',''),
                'house_no'         => input('post.house_no','0'),
                'mark'         => input('post.mark',''),
                'status'        => input('post.status',''),
                'starttime'     => input('post.starttime','0'),
                'endtime'     => input('post.endtime',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_rentview');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',11,LL('need-mark uid')],
                ['house_no','HN3301008',LL('need-mark 房源编码')],
                ['mark','备注',LL('备注')],
                ['starttime','1477620600',LL('开始时间')],
                ['endtime','1477620600',LL('终止时间')],
                ['status','0',LL('need-mark 0：申请看房 2：作废申请')],
            ]);
            return $this->fetch('ava/test');
        }

    }
    //看房列表
    public function queryview(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_queryview',
                'uid'          => input('post.uid',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_queryview');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid',11,LL('need-mark uid')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //房东查看房源签约申请列表
    public function rentapplyview(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type' => 'BY_Rent_rentapplyview',

                'house_no' => input('house_no'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_rentapplyview');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],

                ['house_no','HN3301008',LL('need-mark 房源编码')]
            ]);
            return $this->fetch('ava/test');
        }

    }

    //房东通过看房申请
    public function selectview(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_selectview',
                'house_no'          => input('post.house_no',''),
                'uid'          => input('post.uid',''),
                'status'          => input('post.status','1'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_selectview');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['house_no','HN3301008',LL('need-mark house')],
                ['uid',13,LL('need-mark 房客ID')],
                ['status',1,LL('need-mark 1：通过申请 2：作废申请')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //房东查看已通过的用户
    public function applydone(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Rent_applydone',
                'house_no'          => input('post.house_no',''),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Rent_applydone');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['house_no','HN3301008',LL('need-mark house')],
            ]);
            return $this->fetch('ava/test');
        }

    }


}