<?php

define("CLIENT_ID","by580d6fd2da37e1");
define("CLIENT_SECRET","4256e5b38f10b5794e099c23321cd24f");
define("IS_DEBUG",true);
return [
    'api_url' => 'http://tp51/index.php',
    'site_url' => 'http://tp51/',
    // 默认输出类型
    'default_return_type' => 'html',
    'view_replace_str'    => [
        '__PUBLIC__' => __ROOT__ . '/static/default/' . request()->module() . '/',
        '__JS__'     => __ROOT__ . '/static/default/' . request()->module() . '/js/',
        '__CSS__'    => __ROOT__ . '/static/default/' . request()->module() . '/css/',
        '__IMG__'    => __ROOT__ . '/static/default/' . request()->module() . '/img/',
        '__CDN__'    => ITBOYE_CDN,
    ],
    //测试用
];