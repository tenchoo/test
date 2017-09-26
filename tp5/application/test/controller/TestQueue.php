<?php
/**
 * Created by PhpStorm.
 * User: Zhoujinda
 * Date: 2016/9/30
 * Time: 10:11
 */
namespace app\test\controller;

use think\queue\Queue;

class TestQueue{

    public function index(){

        //Queue::push('index/Job1@task1', $data = '测试任务1');  //立即执行 任务2的task1
//        Queue::later(10,'index/Job1', $data = '房租提醒计划任务');  //立即执行
        Queue::later(3600*24,'index/Rent', $data = '房租提醒计划任务');  //立即执行

        return '开启测试任务，将会立即执行4次，任务类在index/job';

    }

}