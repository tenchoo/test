<?php

$site = '';
$cdn  = 'http://cdn.my/';
$cdn2 = 'http://115.29.220.243';
$css  = './css/';
$js   = './js/';
$tpl_path = '';
$pic_url  = 'http://api.ryzcgf.com/public/index.php/picture/index?id=';

$is_debug = true;

// cache/查询 所有可显示菜单/超级管理员则全部菜单 - 顶级
$menu_all  = [
  1=>['name'=>'控制台','url'=>'#','id'=>"1",'child'=>[
    [
      'name'=>'控制台1','url'=>'#','id'=>"11",
      'child'=>[
        ['name'=>'控制台11','url'=>'1.php','id'=>"111",],
        ['name'=>'控制台12','url'=>'2.php','id'=>"112",],
        ['name'=>'控制台13','url'=>'3.php','id'=>"113",],
      ]
    ],
    [
      'name'=>'控制台2','url'=>'#','id'=>"12",
      'child'=>[
        ['name'=>'控制台21','url'=>'4.php','id'=>"211",],
        ['name'=>'控制台22','url'=>'5.php','id'=>"212",],
      ]
    ],
    [
      'name'=>'控制台3','url'=>'#','id'=>"13",
      'child'=>[]
    ],
  ],],
  2=>['name'=>'商品','url'=>'#','id'=>"2",'child'=>[]],
  3=>['name'=>'用户','url'=>'#','id'=>"3",'child'=>[]],
  4=>['name'=>'其他','url'=>'#','id'=>"4",'child'=>[]],
];