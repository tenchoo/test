<?php
namespace app\admin\controller;
use think\Controller;

class Base extends Controller{

  public function index() {
    $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
    $data = getFaker($map,rand(1,5));
    $this->assign('data',$data);
    return $this -> fetch();
  }
}