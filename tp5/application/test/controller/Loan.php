<?php
/**
 * 住家金融 - 贷款 测试类
 * 2017-04-13 16:07:57
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Loan extends Ava{

  //贷款发放了
  public function address(){
    if(IS_AJAX){
      $d = $this->getPost('BY_Loan_address','uid,address');
      $s = new BoyeService();
      $r = $s->callRemote("",$d,false);
      return $this->parseResult($r);
    }else{
      $this->assign('type','BY_Loan_address');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['uid',12,LL('need-mark UID')],
        ['address','a1:171x;a2:171x;',LL('need-mark 自定义通讯录,最多100个?')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //贷款发放了
  public function start(){
    if(IS_AJAX){
      $d = $this->getPost('BY_Loan_start','id,start');
      $s = new BoyeService();
      $r = $s->callRemote("",$d,false);
      return $this->parseResult($r);
    }else{
      $this->assign('type','BY_Loan_start');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['id',12,LL('need-mark UID')],
        ['start','2017-4-18',LL('need-mark UID')],
      ]);
      return $this->fetch('ava/test');
    }
  }
  //当前贷款
  public function current(){
    if(IS_AJAX){
      $d = $this->getPost('BY_Loan_current','uid');
      $s = new BoyeService();
      $r = $s->callRemote("",$d,false);
      return $this->parseResult($r);
    }else{
      $this->assign('type','BY_Loan_current');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['uid',366,LL('need-mark UID')],
      ]);
      return $this->fetch('ava/test');
    }

  }

  //贷款历史
  public function history(){
    if(IS_AJAX){
      $d = $this->getPost('BY_Loan_history','uid,current_page,per_page');
      $s = new BoyeService();
      $r = $s->callRemote("",$d,false);
      return $this->parseResult($r);
    }else{
      $this->assign('type','BY_Loan_history');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['uid',366,LL('need-mark UID')],
        ['current_page',1,L('page')],
        ['per_page',10,LL('page size')],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //贷款历史
  public function plan(){
    if(IS_AJAX){
      $d = $this->getPost('BY_Loan_plan','uid,id');
      $s = new BoyeService();
      $r = $s->callRemote("",$d,false);
      return $this->parseResult($r);
    }else{
      $this->assign('type','BY_Loan_plan');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['uid',366,LL('need-mark UID')],
        ['id',1,LL('need-mark id')],
      ]);
      return $this->fetch('ava/test');
    }
  }
}