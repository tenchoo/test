<?php
/**
 * Copyright (c) 2016.  hangzhou BOYE .Co.Ltd. All rights reserved
 */

/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2016-12-13
 * Time: 17:08
 */

return array(
    "tip_success" => "操作成功",
    "err_re_login_"=>"登录会话已超时，请重新登录",
    "err_login_"=>"您的帐号于{:time}在未知设备上登录了，如果这不是你的操作，你的密码已经泄漏。",
    "err_login_android"=>"您的帐号于{:time}在一台android手机上登录了，如果这不是你的操作，你的密码已经泄漏。",
    "err_login_ios"=>"您的帐号于{:time}在一台iphone手机设备上登录了，如果这不是你的操作，你的密码已经泄漏。",
    "err_login_pc"=>"您的帐号于{:time}在一台电脑上登录了，如果这不是你的操作，你的密码已经泄漏。",
    "err_login_weixin"=>"您的帐号于{:time}通过微信登录了，如果这不是你的操作，你的密码已经泄漏。",
    "err_login_web"=>"您的帐号于{:time}在一台手机浏览器上登录了，如果这不是你的操作，你的密码已经泄漏。",



    //1-常用
    'ID'=>'ID',
    'UCENTER'=>'统一用户中心',
    'NAME'=>'标识',
    'TITLE'=>'标题',
    'SERIAL_NUMBER'=>'序号',
    'SORT'=>'排序',
    'OPERATOR'=>'操作',
    'UNKNOWN_ERR'=>'未知错误',
    'MENU'=>'菜单',
    'HOME_PAGE'=>'首页',
    'VIEW'=>'查看',
    'SELECT_ALL'=>'全选',
    'STATUS'=>'状态',
    'YES'=>'是',
    'NO'=>'否',
    'NO_DATA'=>'没有相关数据',
    //Ucenter模块

    //3-各视图文件夹
    'VIEW_VOLUME_NUMBERS'=>'卷数',
    'VIEW_BACKUP_NAME'=>'备份名称',
    'VIEW_BACKUP_TIME'=>'备份时间',
    'VIEW_COMPRESS'=>'压缩',
    'VIEW_ISHIDE'=>'隐藏',
    'VIEW_TIP'=>'提示',
    'VIEW_ISDEV'=>'是否开发者模式可见',
    'IS_FRONT'=>'是否前端JS页面',
    'VIEW_URL'=>'链接地址',
    'VIEW_SUBMENU'=>'子菜单',
    'VIEW_DATETIME'=>'日期时间',
    'VIEW_INFO'=>'信息',
    'VIEW_LOG_SYSTEM'=>'系统日志',
    'VIEW_DATA_BACKUP'=>'数据备份',
    'VIEW_BACKUP_STATUS'=>'备份状态',
    'VIEW_CREATE_TIME'=>'创建时间',
    'VIEW_TABLE_NAME'=>'表名',
    'VIEW_DATA_LENGTH'=>'数据量',
    'VIEW_DATA_SIZE'=>'数据大小',
    'VIEW_CUR_PASSWORD'=>'当前密码',
    'VIEW_NEW_PASSWORD'=>'新密码',
    'VIEW_RE_PASSWORD'=>'确认密码',
    'VIEW_UPDATE_PASSWORD'=>'修改密码',
    //4-model类里
    //Menu模型类与模型有关的
    'M_MENU_TIP_EXCEED_CHARS'=>'提示字符太长',
    'M_MENU_TITLE_REQUIRED'=>'标题不能为空',
    'M_MENU_SORT_NUMBER'=>'排序值必为数字',
    'M_CONFIG_NAME'=>'配置名称',
    'M_CONFIG_NAME_HELP'=>'用于C函数调用，只能使用英文且不能重复',
    'M_CONFIG_TITLE'=>'配置说明',
    'M_CONFIG_TITLE_HELP'=>'用于后台显示的配置标题',
    'M_CONFIG_TYPE'=>'配置类型',
    'M_CONFIG_TYPE_HELP'=>'系统会根据不同类型解析配置值',
    'M_CONFIG_REMARK'=>'配置说明',
    'M_CONFIG_REMARK_HELP'=>'配置详细说明',
    'M_CONFIG_SORT'=>'排序',
    'M_CONFIG_SORT_HELP'=>'用于分组显示的顺序',
    'M_CONFIG_VALUE'=>'配置值',
    'M_CONFIG_VALUE_HELP'=>'配置值',
    'M_CONFIG_GROUP'=>'分组',
    'M_CONFIG_GROUP_HELP'=>'配置分组 用于批量设置 不分组则不会显示在系统设置中',
    'M_CONFIG_EXTRA'=>'配置项',
    'M_CONFIG_EXTRA_HELP'=>'如果是枚举型 需要配置该项',
    //5-操作结果
    'RESULT_SUCCESS'=>'操作成功',
    'RESULT_FAILED'=>'操作失败',

    //6-页面上的placeholder
    'PLACEHOLDER_USERNAME'=>'请输入用户名',
    'PLACEHOLDER_PASSWORD'=>'请输入密码',
    'PLACEHOLDER_TITLE'=>'请输入标题',
    'PLACEHOLDER_URL'=>'请输入链接地址',
    'PLACEHOLDER_NAME'=>'请输入名称',
    'PLACEHOLDER_VALUE'=>'请输入值',
    'PLACEHOLDER_EXTRA'=>'请输入配置项',
    'PLACEHOLDER_NEW_PASSWORD'=>'请输入新密码',
    'PLACEHOLDER_RE_PASSWORD'=>'请输入确认密码',
    'PLACEHOLDER_VERIFY'=>'请输入验证码',
    //7-按钮
    'BTN_EXIT'=>'退出',
    'BTN_MY_CENTER'=>'个人中心',
    'BTN_MODIFY_PWD'=>'修改密码',
    'BTN_FULLSCREEN'=>'全屏',
    'BTN_DELETE'=>'删除',
    'BTN_EDIT'=>'编辑',
    'BTN_ADD'=>'添加',
    'BTN_SEARCH'=>'查找',
    'BTN_VIEW'=>'查看',
    'BTN_SAVE'=>'保存',
    'BTN_CANCEL'=>'取消',
    'BTN_REGISTER'=>'注册',
    'BTN_LOGIN'=>'登录',
    'BTN_FORGET_PWD'=>'忘记密码了？',
    'BTN_BACK'=>'返回',
    'BTN_BACKUP'=>'立即备份',
    'BTN_TABLE_REPAIR'=>'修复表',
    'BTN_TABLE_OPTIMIZE'=>'优化表',
    'BTN_SELECTED_DELETE'=>'选中项删除',
    'BTN_REDUCTION'=>'还原',
    'BTN_NODE_GRANT_AUTHORITY'=>'权限设置',
    'BTN_MEMBER_GRANT_AUTHORITY'=>'成员管理',
    'BTN_ENABLE'=>'启用',
    'BTN_DISABLE'=>'禁用',
    'BTN_SEND_MESSAGE'=>'发送消息',
    'BTN_SEND'=>'发送',
    'BTN_VIEW_HIS'=>'查看消息记录',
    'BTN_VIEW_FAULT_HIS'=>'查看故障记录',
    //8- 控制器内
    'C_GET_NULLDATA'=>'获取数据出错！',
    'C_CONFIG'=>'系统配置',
    //操作成功信息
    'SUC_LOGIN'=>'登录成功~',
    //错误
    'ERR_NO_PERMISSION'=>'没有权限',
    'ERR_DATE_INVALID'=>'日期参数格式错误',
    'ERR_PARAMETERS'=>'参数错误',
    'ERR_SYSTEM_BUSY'=>'系统繁忙',
    'ERR_SESSION_TIMEOUT'=>'会话超时',
    'ERR_NEED_OLD_PASSWORD'=>'请输入原密码',
    'ERR_NEED_NEW_PASSWORD'=>'请输入新密码',
    'ERR_NEED_CONFIRM_PASSWORD'=>'请输入确认密码',
    'ERR_NEED_SAME_PASSWORD'=>'密码不一致',
    'ERR_LOGIN'=>'登录失败',
    'ERR_VERIFY'=>'验证码出错',
    'ERR_CANT_DEL_HAS_CHILDREN'=>'有子节点时不能删除当前节点，请先删除子节点',
    //模型验证错误信息
    'MV_CONFIG_TITLE'=>'配置名称不能为空',
    'MV_CONFIG_NAME'=>'配置标识不能为空',
    'MV_CONFIG_GROUP'=>'分组非法',
    'MV_CONFIG_TYPE'=>'类型非法',
    'MV_AUTHGROUP_TITLE'=>'用户组名称必需',
    //提示
    'TIP_CONFIG_CHANGE_MUST_CLEAR_CACHE'=>'如果配置更改一般需要5分钟后才能生效，想立即生效的话请清除缓存',
    'STATUS_NO_BACKUP'=>'未备份',


    //MESSAGE
    'MESSAGE_PUSH'=>'推送消息',

    //VIEW
    'V_AUTHMANAGE_AUTH_GROUP_TITLE'=>'用户组',
    'V_AUTHMANAGE_AUTH_GROUP_NOTES'=>'描述',
    'V_AUTHMANAGE_GRANT_AUTHORIZATION'=>'授权',

    //wallet
    "err_applying"=>"申请中",

    //MODEL

    //CONTROLLER
    "driver_verify_pass"=>"恭喜!您的司机认证已通过！",
    "driver_verify_deny"=>"您的司机认证未通过，原因:{:reason}。",
    "driver_verify_deny2"=>"司机认证未通过",
    "worker_verify_pass"=>"恭喜!您的技工认证已通过！",
    "worker_verify_deny"=>"您的技工认证未通过，原因:{:reason}。",
    "worker_verify_deny2"=>"技工认证未通过",
);
