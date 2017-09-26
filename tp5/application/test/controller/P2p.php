<?php
/**
 * 住家金融 - 定期 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class P2p extends Ava{

  //退款
  public function refund(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_refund','id,uid,msg');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','BY_P2p_refund');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['id',1,LL('need-mark ID')],
          ['uid','11','UID'],
          ['msg','',''],
      ]);
      return $this->fetch('ava/test');
    }

  }

  //转让
  public function transfer(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_transfer','id,uid');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','BY_P2p_transfer');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['id',1,LL('need-mark ID')],
          ['uid','11','UID'],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //募集完成
  public function enough(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_enough','id,start,token');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','BY_P2p_enough');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['id',1,LL('need-mark ID')],
          ['token','itboye3211','验证字符串'],
          ['start','','开始计息时间,时间戳或日期字符串'],
      ]);
      return $this->fetch('ava/test');
    }

  }

  //p2p用户还款计划
  public function payBackUser(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_payBackUser','uid,id');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_payBackUser');

      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['uid',11,LL('need-mark uid')],
          ['id',1,LL('need-mark p2p_id')],
      ]);
      return $this->fetch('ava/test');
    }
  }
  //p2p还款计划
  public function payBackDue(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_payBackDue','rate_year,money,pay_type,start_time,month,day');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_payBackDue');

      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['rate_year',1200,LL('need-mark').'万倍年化率,int'],
          ['money',10000,LL('need-mark money').'分,int'],
          ['month',1,'月/期数,与day只能有一个,int'],
          ['day','','天数,与month只能有一个,int'],
          ['pay_type',6389,'回款类型6388/6389,month有才有效,int'],
          ['start_time','','开始计息时间,时间戳或日期字符串'],
      ]);
      return $this->fetch('ava/test');
    }
  }
  //p2p-list
  public function query(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_query','current_page,per_page,b_status,dt_type,order');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_query');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['current_page','',L('page')],
          ['per_page','',LL('page size')],
          ['b_status','',L('p2p-b-status')],
          ['dt_type','',L('p2p-dt-type')],
          ['order','',L('p2p-list-order')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //my-p2p-list
  public function myInvest(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_myInvest','uid,current_page,per_page,status');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_myInvest');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['uid',11,LL('need-mark UID')],
          ['current_page','',L('page')],
          ['per_page','',LL('page size')],
          ['status','',L('p2p-invest-status')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //item
  public function item(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_item','id');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_item');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['id',1,LL('need-mark id')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //lender-list
  public function lender(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_lender','id');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_lender');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['id',1,LL('need-mark id')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //invest
  public function invest(){
    if(IS_AJAX){
      $data = $this->getPost('BY_P2p_invest','uid,id,money');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_P2p_invest');
      $this->assign('field',[
          ['api_ver',$this->api_ver,LL('need-mark api version')],
          ['uid',11,LL('need-mark uid')],
          ['id',1,LL('need-mark id')],
          // ['test',0,'test'],
          ['money',0,LL('need-mark money')],
      ]);
      return $this->fetch('ava/test');
    }
  }
}