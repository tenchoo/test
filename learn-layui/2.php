<?php
require 'config.php';
require 'common.php';
// task logic
const UID = 2;

$uid   = UID;
$uinfo = ['name'=>'name1718888123','nick'=>'rainbow','avatar'=>'http://t.cn/RCzsdCq'];

// 查询用户顶级菜单
$top_menu_id = 1;
$left_menu = $menu_all[$top_menu_id]['child'];
$menu_id   = _get('menu_id',0);
?>
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
<table lay-filter="demo" class="layui-table" style="width:80%;margin-left: 10%;">
  <thead>
    <tr>
      <th lay-data="{field:'username', width:100}">昵称</th>
      <th lay-data="{field:'experience', width:80, sort:true}">积分</th>
      <th lay-data="{field:'sign', width:300}">签名</th>
      <th lay-data="{field:'cc', width:220}">操作</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>贤心1</td>
      <td>66</td>
      <td>人生就像是一场修行a</td>
      <td><a href="3.php">查看</a></td>
    </tr>
    <tr>
      <td>贤心2</td>
      <td>88</td>
      <td>人生就像是一场修行b</td>
      <td><a href="3.php">查看</a></td>
    </tr>
    <tr>
      <td>贤心3</td>
      <td>33</td>
      <td>人生就像是一场修行c</td>
      <td>
        <a href="3.php" class="layui-btn layui-btn-small">查看</a>
        <a href="3.php" class="layui-btn layui-btn-small">编辑</a>
        <a href="3.php" class="layui-btn layui-btn-small ajax-get confirm">删除</a>
      </td>
    </tr>
  </tbody>
</table>
  </div>
  <!-- 底部固定区域 -->
  <div class="layui-footer  layui-anim layui-anim-up">
    © layui.com - 底部固定区域
  </div>
</div>
<!-- script -->
<script defer="defer">
// page init
layui.use(['layer','table','element'], function(){
  mylog('page','init');

  var layer = layui.layer,
  table = layui.table,
  $ = layui.$;

  //执行渲染
  // table.init('demo',{ width:750 });
});
</script>
<script type="text/html" id="usernameTpl">
  {{#  if(d.id < 10005){ }}
    <a href="/detail/{{ d.id }}" class="layui-table-link">{{ d.username }}</a>
  {{#  } else { }}
    {{ d.username }} (普通)
  {{#  } }}
</script>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
  <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
  {{#  if(d.auth > 2){ }}
    <a class="layui-btn layui-btn-mini" lay-event="check">审核</a>
  {{#  } }}
</script>
</body>
</html>