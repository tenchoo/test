<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> layer </title>
  <link rel="stylesheet" href="<?=$cdn?>layui/2.1.3/css/layui.css">
  <link rel="stylesheet" href="<?=$cdn?>nprogress/nprogress.css">
  <link rel="stylesheet" href="<?=$cdn?>select2/4.0.0/css/select2.min.css">
  <link rel="stylesheet" href="<?=$cdn?>scojs/1.0.2/css/sco.message.css">
  <link rel="stylesheet" href="<?=$cdn?>font-awesome/4.7.0/css/font-awesome.min.css">

  <?php if($is_debug){ ?>
  <link rel="stylesheet" href="<?=$css?>skin/dist/common.css" media="screen">
  <link rel="stylesheet" href="<?=$css?>skin/dist/skin.css" media="screen">
  <?php }else{ ?>
  <link rel="stylesheet" href="<?=$css?>common.css" media="screen">
  <link rel="stylesheet" id="style-color" href="<?=$css?>skin/df.css" media="screen">
  <?php } ?>
  <style>
  </style>

  <script src="<?=$cdn?>jquery/1.11.0/jquery.min.js"></script>
  <script src="<?=$cdn?>layui/2.1.3/layui.js"></script><!-- 按需加载 -->
  <script src="<?=$cdn?>nprogress/nprogress.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.modal.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.message.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.confirm.js"></script>
  <script src="<?=$js?>common.js" defer="defer"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
  <!-- 头部区域 -->
  <div class="layui-header">
    <div class="layui-logo">LOGO / SITENAME</div>
    <a href="javascript:;" id="js-hide-menu" class="switch-menu-wrap"><i class="fa fa-bars"></i> </a>
    <ul class="layui-nav layui-layout-left">
      <?php foreach ($menu_all as $v) { ?>
      <li class="layui-nav-item <?php if($top_menu_id== $v['id']) echo 'layui-this';?>" data-id="<?=$v['id']?>"><a href=""><?=$v['name']?></a></li>
      <?php } ?>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item"><a href="javascript:;" class=""> <i class="fa fa-bell" style="position: relative;top:3px;font-size: 22px;"></i><i class="layui-badge">5</i> </a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="<?=$uinfo['avatar']?>" class="layui-nav-img">
          <?=$uinfo['nick']?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="ajax.php?op=logout" class="ajax-get">退了</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;" id="admin-fullscreen"><i class="fa fa-arrows-alt"></i> <span class="admin-fullText">全屏</span> </a>
      </li>
    </ul>
  </div>

  <!-- 左侧导航区域 -->
  <div class="layui-side side-menu">
    <div class="layui-side-scroll">
      <ul class="layui-nav layui-nav-tree layui-nav-side" lay-filter="side-menu">
        <?php foreach ($left_menu as $v) { ?>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;"><i class="layui-icon">&#xe620;</i> <?=$v['name']?></a>
          <?php if (isset($v['child'])){ ?>
          <dl class="layui-nav-child">
            <?php foreach ($v['child'] as $v2) { ?>
            <dd class="<?php if($v2['id'] == $menu_id) echo 'layui-this'; ?>"><a href="<?=$v2['url']?>?menu_id=<?=$v2['id']?>">&nbsp;&nbsp;&nbsp;&nbsp;<?=$v2['name']?></a></dd>
            <?php } ?>
          </dl>
          <?php } ?>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <!-- 内容主体 -->
  <div class="layui-body">