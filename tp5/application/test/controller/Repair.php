<?php
/**
 * 张健 hzboye013@163.com
 * addby sublime snippets
 * File Test 附件测试类
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Repair extends Ava{
    //添加维修项目
    public function add(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_add',

                'repair_type'          => input('post.repair_type',''),
                'name'         => input('post.name','0'),
                'ill'         => input('post.ill',''),
                'check'         => input('post.check',''),
                'repay'         => input('post.repay',''),
                'little'         => input('post.little',''),
                'big'         => input('post.big',''),
                'status'         => input('post.status','0'),
                'id'         => input('post.id','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_add');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['repair_type','6313',LL('need-mark 6313:紧急维修 6314:家电维修 6315:居家维修')],
                ['name','电视维修',LL('need-mark 项目名称')],
                ['ill','说明说明说明',LL('need-mark 说明')],
                ['check','100',LL('need-mark 检测报价')],
                ['repay','200',LL('need-mark 检修报价')],
                ['little','300',LL('need-mark 小修报价')],
                ['big','400',LL('need-mark 大修报价')],
                ['status','1',LL('need-mark 1:添加 2:删除')],
                ['id','1',LL('need-mark 项目id')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //添加维修师傅
    public function addworker(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_addworker',

                'repair_type'          => input('post.repair_type',''),
                'name'         => input('post.name','0'),
                'mobile'         => input('post.mobile',''),
                'area'         => input('post.area',''),
                'areazone'         => input('post.areazone',''),
                'status'         => input('post.status',''),
                'wid'         => input('post.wid',''),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else {
            $this->assign('type', 'BY_Repair_addworker');
            $this->assign('post_url', config('API_URL') . '/index/domain/repairdomain/addworker');
            $this->assign('field', [
                ['api_ver', 100, LL('need-mark api version')],
                //first
                ['repair_type', '6313', LL('need-mark 6313:紧急维修 6314:家电维修 6315:居家维修')],
                ['name', '王师傅', LL('need-mark 师傅名称')],
                ['mobile', '13013013013013', LL('need-mark 电话')],
                ['area', '330106', LL('need-mark 服务行政区')],

                ['areazone', '33010601', LL('need-mark 工作区域1')],

                ['status', '1', LL('need-mark 操作1：添加 2：删除')],
                ['wid', '1', LL(' 师傅id')],
            ]);
            return $this->fetch('ava/test');
        }
        }


    //添加维修师傅头像
    public function addworkerpic(){

            $this->assign('type', 'BY_Repair_addworkerpic');
            $this->assign('post_url', config('API_URL') . '/Repair/addworkerpic?client_id='.CLIENT_ID);


            $this->assign('field', [
                ['api_ver', 100, LL('need-mark api version')],
                //first
                ['id', '1', LL(' 师傅id')],
            ]);
            return $this->fetch('file/upload');

    }



    //查询师傅评价标签
    public function findtags(){

        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_findtags',
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_findtags');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
            ]);
            return $this->fetch('ava/test');
        }

    }

    //查看维修申请
    public function query(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_query',
                'community'         => input('post.community','0'),
                'status'         => input('post.status','0'),
                'p'         => input('post.p','0'),
                'id'         => input('post.id'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_query');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['community','0',LL('need-mark 小区，为0则是全部')],
                ['status','-1',LL('need-mark 订单状态，-1：则是全部 0：申请中 1：已委派师傅 2：维修完成')],
                ['p','1',LL('need-mark 页码')],
                ['id','1',LL('need-mark id')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //查询维修师傅
    public function mate(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_mate',
                'repair_id'         => input('post.repair_id','0'),
                'areazone'         => input('post.areazone','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_mate');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['repair_id','6313',LL('repair 维修类型')],
                ['areazone','33010601',LL('need-mark 维修地区')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //委派维修师傅
    public function send(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_send',
                'apply_id'         => input('post.apply_id','0'),
                'wid'         => input('post.wid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_send');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['apply_id','5',LL('repair 维修项目id')],
                ['wid','6',LL('need-mark 师傅id')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //委派维修师傅
    public function end(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_end',

                'pid'         => input('post.pid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_end');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first

                ['pid','6',LL('need-mark 订单id')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //查看维修信息
    public function show(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_show',
                'status'     => input('post.status','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_show');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['status','1',LL('need-mark 1:显示所有维修详情 2：显示所有维修类目')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //申请*取消申请维修信息
    public function addapply(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_addapply',
                'uid'         => input('post.uid','0'),
                'uname'         => input('post.uname','0'),
                'umobile'         => input('post.umobile','0'),
                'repair_id'         => input('post.repair_id','0'),
                'repair_status'         => input('post.repair_status','0'),
                'ill'         => input('post.ill','0'),
                'address'         => input('post.address','0'),
                'community'         => input('post.community','0'),
                'image'         => input('post.image','0'),
                'status'=> input('post.status','0'),
                'id'=> input('post.id','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_addapply');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark 用户id')],
                ['uname','王小明',LL('need-mark 报修人姓名')],
                ['umobile','13013013011',LL('need-mark 报修人电话')],
                ['repair_id','2',LL('need-mark 报修项目')],
                ['repair_status','2',LL('need-mark 报修程度1：检测2检修3小修4大修')],
                ['ill','我的电视怪掉了，快点来修！！！！！！',LL('need-mark 情况详情')],
                ['address','新手村581号',LL('need-mark 详细地址')],
                ['community','33010601',LL('need-mark 小区code')],
                ['image','1',LL('need-mark 图片')],
                ['status','1',LL('need-mark 1：申请 2：取消申请')],
                ['id','1',LL('need-mark 申请id')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //查看维修状态
    public function look(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_look',
                'uid'         => input('post.uid','0'),
                'status'         => input('post.status','-1'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_look');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark 用户id')],
                ['status','1',LL('need-mark 维修状态0：申请中 2：维修中3：维修结束')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //师傅已到
    public function arrive(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_arrive',
                'pid'         => input('post.pid','0'),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_arrive');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['pid','1',LL('need-mark 项目id')],

            ]);
            return $this->fetch('ava/test');
        }

    }

    //支付订单
    public function paylist(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_paylist',
                'pid'         => input('post.pid','0'),
                'uid'         => input('post.uid','0'),
                'status'         => input('1','0'),
                'pay_type'         => input('post.pay_type','0'),
                'pay_money'         => input('post.pay_money','0'),
                'pay_code'         => input('post.pay_code','0'),
                'trade_code'         => input('post.trade_code','0'),
                'time'         => input('post.time','0'),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_paylist');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['pid','1',LL('need-mark 项目id')],
                ['uid','1',LL('need-mark uid（验证用）')],
                //['status','1',LL('need-mark 1:生成订单 2：取消订单')],
                ['pay_type','1',LL('need-mark 支付方式(1|支付宝支付2|微信支付3|融丰支付4|线下支付)')],
                ['pay_money','1',LL('need-mark 实际支付金额')],
                ['pay_code','1',LL('need-mark 支付编号')],
                ['trade_code','1',LL('need-mark 第三方支付交易编码')],
                ['time','1',LL('need-mark 完成时间')],
            ]);
            return $this->fetch('ava/test');
        }

    }

    //支付订单
    public function payshow(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_payshow',
                'pid'         => input('post.pid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_payshow');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['pid','1',LL('need-mark 项目id')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    //评价维修
    public function evaluate(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_evaluate',
                'pid'         => input('post.pid','0'),
                'tags'         => input('post.tags','0'),
                'evaluate'         => input('post.evaluate','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_evaluate');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
               //['uid','1',LL('need-mark 用户id')],
                ['pid','1',LL('need-mark 维修项目id')],
                ['evaluate','1',LL('need-mark 评价星级（int）')],
                ['tags','13,12,13',LL('need-mark 评价标签')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //结束维修
    public function endapply(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_endapply',
                'pid'         => input('post.pid','0'),
                'uid'         => input('post.uid','0'),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_endapply');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                //['uid','1',LL('need-mark 用户id')],
                ['pid','1',LL('need-mark 维修项目id')],
                ['uid','1',LL('need-mark uid')],

            ]);
            return $this->fetch('ava/test');
        }

    }


    //更新维修师傅的评价
    public function updataevaluate(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_updataevaluate',
                //'uid'         => input('post.uid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_updataevaluate');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                //['uid','1',LL('need-mark 用户id')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //生成维修支付订单
    public function order(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_order',

                'uid'         => input('post.uid','0'),
                'pid'         => input('post.pid','0'),
                'wallet_pay_money' => input('post.wallet_pay_money','-1'),
                'status'         => input('post.status','0'),
                'id'         => input('post.id','0'),
                'puid'         => input('post.puid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_order');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark 用户id')],
                ['pid','12',LL('need-mark 项目id')],
                ['wallet_pay_money','0',LL('need-mark 虚拟钱包支付金额')],
                ['status','0',LL('need-mark 1：生成订单2：取消订单')],
                ['id','2',LL('need-mark 订单id，取消必须')],
                ['puid','1',LL('need-mark uid，取消必须')],
            ]);
            return $this->fetch('ava/test');
        }

    }


    //查看生成维修支付订单
    public function payshowlist(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_payshowlist',

                'uid'         => input('post.uid','0'),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_payshowlist');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark 用户id')],

            ]);
            return $this->fetch('ava/test');
        }

    }


    ////协商维修金额
    public function tranmoney(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_tranmoney',
                'uid'         => input('post.uid','0'),
                'pid'         => input('post.pid','0'),
                'newmoney'         => input('post.newmoney','0'),
                'code'         => input('post.code','0'),

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_tranmoney');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark 用户id')],
                ['pid','1',LL('need-mark 申请id')],
                ['newmoney','1',LL('need-mark 新的金额')],
                ['code','1',LL('need-mark code')],

            ]);
            return $this->fetch('ava/test');
        }

    }


    ////可以支付
    public function canpay(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_canpay',
                'pid'         => input('post.pid','0'),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_canpay');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['pid','1',LL('need-mark 申请id')],
            ]);
            return $this->fetch('ava/test');
        }

    }



    ////可以支付
    public function addlock(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_addlock',
                'uid'         => input('post.uid','0'),
                'name'=> input('post.name',0),

                'mobile'=> input('post.mobile',0),
                'address'=> input('post.address',0),
            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_addlock');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first
                ['uid','1',LL('need-mark uid')],
                ['name','1',LL('need-mark name')],
                ['mobile','1',LL('need-mark mobile')],
                ['address','1',LL('need-mark address')],

            ]);
            return $this->fetch('ava/test');
        }

    }


    ////可以支付
    public function setlockinfo(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_setlockinfo',

            ];
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            return $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_setlockinfo');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                //first

            ]);
            return $this->fetch('ava/test');
        }

    }

    //维修地址列表
    public function addressList(){
        if(IS_AJAX){
            $data = [
                'api_ver' => $this->api_ver,
                'type'    => 'BY_Repair_addressList',
            ];
            $filter = [
                ['uid']
            ];
            $data = array_merge($data, $this->getPostParams($filter));
            $service = new BoyeService();
            $result = $service->callRemote("",$data,false);
            $this->parseResult($result);
        }else{
            $this->assign('type','BY_Repair_addressList');
            $this->assign('field',[
                ['api_ver',100,LL('need-mark api version')],
                ['uid','97', LL('need-mark')]

            ]);
            return $this->fetch('ava/test');
        }
    }




}