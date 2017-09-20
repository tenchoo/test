<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 生成假数据对象列表
 * eg:
 * $map = ['id'=>['numberBetween',[1,99]],'name'=>['firstName',[]]];
 * getFaker($map,rand(1,5));
 * return faker object list
 */
require '../extend/faker/autoload.php';
function getFaker(array $rules,$count=1){
    // vendor('faker.autoload');
    $faker = \Faker\Factory::create('zh_CN');
    $r = [];
    for ($i=0; $i < $count; $i++) {
        $map = [];
        foreach ($rules as $k => $v) {
            $map[$k] = call_user_func_array([$faker,$v[0]], $v[1]);
        }
        $r[] = $map;
    }
    return $r;
}