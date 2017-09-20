<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2016-10-02
 * Time: 16:08
 */

namespace app\index\controller;

use think\Controller;

class Test extends Controller{

    public function faker(){
        $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
        $count = rand(1,5);
        $data  = getFaker($map,$count);
        return ajaxReturnSuc('','',$data,$count);
    }
}