<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2016-10-02
 * Time: 16:08
 */

namespace app\index\controller;
use think\Exception;
use app\src\base\helper\ExceptionHelper;
use think\Response;
use think\exception\HttpResponseException;

class Test extends Base{
  public function index(){

    try{
    }catch (Exception $ex) {
      $this->apiReturnErr(ExceptionHelper::getErrorString($ex), ErrorCode::Business_Error);
    }
  }
  public function except(){
    $this->apiReturnErr('error');
  }

  public function val(){
    // echo phpinfo();
    // echo getenv('PHP_THINK_PATH');
    // dump($GLOBALS['_GET']);
    // dump(config('app.exception_tmpl'));
    dump(config('exception_handle'));
  }

  public function faker(){

    // $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
    // $count = rand(1,5);

    // $data  = getFaker($map,$count);
    // $this->apiReturnSuc($data);
  }

}