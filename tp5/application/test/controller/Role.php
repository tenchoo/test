<?php
/**
 * 周舟 hzboye010@163.com
 * addby sublime snippets
 * Role Test 角色定义测试类 - system
 */

namespace app\test\controller;

use app\extend\BoyeService;

class Role extends Ava {

  //查看角色
  public function view(){
    if(IS_AJAX){
      $data = [
        'type'     =>'AM_Role_view',
        'api_ver'  =>$this->api_ver,
        'aid'      =>input('post.aid'),
        'kword'    => input('post.kword',''),
        'order'    => input('post.order',''),
        'current_page' => input('post.current_page', ''),
        'per_page'     => input('post.per_page', ''),
      ];

      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','AM_Role_view');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['aid','',LL('need-mark admin_login_uid')],
        ['current_page',1, L('page-number')],
        ['kword','', L('key-word')],
        ['order','id desc', L('order')],
        ['per_page',10, L('page-size')],
      ]);
      return $this -> fetch('ava/test');
    }
  }
  //查看角色
  public function edit(){
    if(IS_AJAX){
      $data = [
        'type'    =>'AM_Role_edit',
        'api_ver' =>$this->api_ver,
        'aid'     =>input('post.aid'),
        'name'    =>input('post.name'),
        'id'      =>input('post.id'),
        'desc'    =>input('post.desc'),
      ];

      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','AM_Role_edit');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['aid','',LL('need-mark admin_login_uid')],
        ['name','',LL('need-mark name')],
        ['id',2,LL('need-mark role_id')],
        ['desc','',LL('need-mark desc')],
      ]);
      return $this -> fetch('ava/test');
    }
  }
  //删除角色
  public function del(){
    if(IS_AJAX){
      $data = [
        'type'    =>'AM_Role_del',
        'api_ver' =>$this->api_ver,
        'aid'     =>input('post.aid'),
        'id'      =>input('post.id'),
      ];

      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','AM_Role_del');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['aid','',LL('need-mark admin_login_uid')],
        ['id','',LL('need-mark role_id')],
      ]);
      return $this -> fetch('ava/test');
    }
  }
  //添加角色
  public function add(){
    if(IS_AJAX){
      $data = [
        'type'    =>'AM_Role_add',
        'api_ver' =>$this->api_ver,
        'aid'     =>input('post.aid'),
        'name'    =>input('post.name'),
        'type_id' =>input('post.type_id'),
        'desc'    =>input('post.desc'),
      ];

      $service = new BoyeService();
      $result  = $service->callRemote("",$data,false);
      return $this->parseResult($result);
    }else{
      $this->assign('type','AM_Role_add');
      $this->assign('field',[
        ['api_ver',$this->api_ver,LL('need-mark api version')],
        ['aid','',LL('need-mark admin_login_uid')],
        ['name','',LL('need-mark name')],
        ['type_id',2,LL('need-mark type_id')],
        ['desc','',LL('need-mark desc')],
      ]);
      return $this -> fetch('ava/test');
    }
  }
}