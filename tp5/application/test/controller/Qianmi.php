<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * 千米E生活 测试类
 */
namespace app\test\controller;

use app\extend\BoyeService;

class Qianmi extends Ava{

  //测试
  // public function test(){
  //     if(IS_AJAX){
  //         $data = $this->getPost('BY_Qianmi_test','');
  //         $service = new BoyeService();
  //         $result = $service->callRemote("",$data,false);
  //         return $this->parseResult($result);

  //     }else{
  //         $this->assign('type','BY_Qianmi_test');
  //         $this->assign('field',[
  //             ['api_ver',$this->api_ver,LL('need-mark api version')],
  //         ]);
  //         return $this->fetch('ava/test');
  //     }

  // }

  //水电煤属性
  public function propsList(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_propsList','itemId');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_propsList');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['itemId','6424200',LL('need-mark itemId')],
          ]);
          return $this->fetch('ava/test');
      }

  }

  //查询欠费 - 生活缴费
  public function getInfo(){
    if(IS_AJAX){
      $data = $this->getPost('BY_Qianmi_getInfo','itemId,account,modeType,supUserId');
      $service = new BoyeService();
      $result = $service->callRemote("",$data,false);
      return $this->parseResult($result);

    }else{
      $this->assign('type','BY_Qianmi_getInfo');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['itemId','64486902',L('need-mark').'标准商品编号(页面选择)'],
        ['account','6010469100',L('need-mark').'缴费单标识号（户号或条形码）'],
        ['modeType','2','缴费方式：1是条形码 2是户号'],
        ['supUserId','S080806','供货商编号'],
      ]);
      return $this->fetch('ava/test');
    }
  }

  //发起千米支付
  public function payBill(){

      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_payBill','billId,token');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_payBill');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['billId','S1702115958251',LL('need-mark billId')],
              ['token','',LL('need-mark token')],
          ]);
          return $this->fetch('ava/test');
      }
  }
  //订单退款
  public function refund(){

      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_refund','billId,token');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_refund');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['billId','S1702115958251',LL('need-mark billId')],
              ['token','',LL('need-mark token')],
          ]);
          return $this->fetch('ava/test');
      }

  }
  //更新已支付的充值中订单
  public function updateCharge(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_updateCharge','billId');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_updateCharge');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['billId','S1702115958251',LL('need-mark billId').',为空为一键更新'],
          ]);
          return $this->fetch('ava/test');
      }

  }

  //水电煤商品 list
  public function itemList(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_itemList','pageNo,pageSize,provinceVid,cityVid,projectId,itemName,province,city');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_itemList');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['pageNo',0,'页码,从0开始'],
              ['pageSize',10,'单页返回的记录数'],
              ['provinceVid','','省属性v编号'],
              ['cityVid','','市属性v编号'],
              ['projectId','','缴费项目编号,[c2670=>水费,c2680=>电费,c2681=>气费]'],
              ['itemName','','标准商品名称,支持不带特殊字符的模糊匹配'],
              ['province','浙江','省属性名称,不带"省"'],
              ['city','杭州','市名称(后面不带"市")'],
          ]);
          return $this->fetch('ava/test');
      }
  }

  //水电煤商品 属性list
  public function itemPropsList(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_itemPropsList','');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_itemPropsList');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
          ]);
          return $this->fetch('ava/test');
      }
  }

  //生成订单 - 话费充值
  public function rechargeMobile(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_rechargeMobile','uid,mobileNo,rechargeAmount');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_rechargeMobile');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['mobileNo','15168455815',LL('need-mark mobileNo')],
              ['rechargeAmount','500',LL('need-mark rechargeAmount').',单位:分'],
              ['uid','11',LL('need-mark UID')],
          ]);
          return $this->fetch('ava/test');
      }
  }

  //生成订单 - 水电煤缴费
  public function waterCoal(){
      if(IS_AJAX){
          $data = $this->getPost('BY_Qianmi_waterCoal','itemId,uid,itemNum,rechargeAccount,contactName');
          $service = new BoyeService();
          $result = $service->callRemote("",$data,false);
          return $this->parseResult($result);

      }else{
          $this->assign('type','BY_Qianmi_waterCoal');
          $this->assign('field',[
              ['api_ver',$this->api_ver,LL('need-mark api version')],
              ['itemId','6424200',L('need-mark').'代缴商品代号(查看<a href="'.url('Qianmi/itemList').'" target="_blank">水电煤商品查询接口BY_Qianmi_itemList</a> 或 在下方选择后填写itemId)'],
              ['itemNum','102',L('need-mark').'缴费金额(请自行查询欠费金额,不保证缴费成功,单位:分)'],
              ['rechargeAccount','6010469100',L('need-mark').'户号(缴费账户)'],
              ['contactName','','户主姓名(建议填写)'],
              ['uid','11',LL('need-mark UID')],
          ]);
          return $this->fetch();
      }
  }
}