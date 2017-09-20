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
      <ul class="layui-nav layui-nav-tree  layui-nav-side" lay-filter="side-menu">
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


<div class="skin-box hide">
  <a href="#" class="skin layui-nav-img" data-skin="df" data-ref="393D49"></a>
  <a href="#" class="skin layui-nav-img" data-skin="cyan" data-ref="2F4056"></a>
  <a href="#" class="skin layui-nav-img" data-skin="blue" data-ref="169fe6"></a>
  <a href="#" class="skin layui-nav-img" data-skin="green" data-ref="009688"></a>
  <a href="#" class="skin layui-nav-img" data-skin="red" data-ref="fb6e52"></a>
  <a href="#" class="skin layui-nav-img" data-skin="orange" data-ref="FFB800"></a>
  <a href="#" class="skin layui-nav-img" data-skin="gray" data-ref="eeeeee"></a>
</div>
<p>
  <span class="layui-breadcrumb">
    <a href="">首页</a>
    <a href="">国际新闻</a>
    <a href="">亚太地区</a>
    <a><cite>正文</cite></a>
  </span>
</p>

<button id="js-test" class="layui-btn">test</button>

<select name="sex" id="js-sex">
  <option value=""> ==性别== </option>
  <option value="1"> 男 </option>
  <option value="2"> 女 </option>
  <option value="3"> 其他 </option>
</select>

<div class="layui-form layui-form-pane" lay-filter="city-warp">
  <select name="city" lay-verify="required" lay-filter="city">
    <option value=""></option>
    <option value="0">北京</option>
    <option value="1">上海</option>
    <option value="2">广州</option>
    <option value="3">深圳</option>
    <option value="4">杭州</option>
  </select>

  <textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textarea w300"></textarea>

  <pre class="layui-code">这样有木有觉得更方便些</pre>

  <div class="layui-form-item">
    <label class="layui-form-label">配置名称</label>
    <div class="layui-input-inline w300">
      <input type="text" class="layui-input field-name" name="name" lay-verify="required" autocomplete="off" value="">
    </div>
    <div class="layui-form-mid layui-word-aux">由英文字母和下划线组成，必须以字母开头，如：web_name，调用方法：<span class="red">config('<span id="groupShow"></span>.web_name')</span>
    </div>
  </div>
</div>

<div class="layui-form">
  <div class="layui-form-item layui-input-block">
    <form>
      <input type="text" name='id' value='' class="layui-input post-form">
      <button class="layui-btn ajax-get confirm" href="ajax.php" >get提交</button>
      <button target-form="post-form" class="layui-btn ajax-post" href="ajax.php" >post提交</button>
      <a href="javascript:history.go(-1)" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </form>
  </div>
</div>

<div class="layui-row">
  <div class="layui-col-md6">
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>系统信息</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>系统版本</td>
      <td></td>
    </tr>
    <tr>
      <td>服务器环境</td>
      <td></td>
    </tr>
    <tr>
      <td>PHP/MySql版本</td>
      <td></td>
    </tr>
    <tr>
      <td>ThinkPHP版本</td>
      <td></td>
    </tr>
  </tbody>
</table>
  </div>
  <div class="layui-col-md6">
<table class="layui-table">
  <tr><th>审核图片</th></tr>
  <tr>
    <td class="img-warp" id="img-warp">
      <img layer-src="<?=$pic_url?>1690" src="<?=$pic_url?>1690&size=120" alt="1690">
      <img layer-src="<?=$pic_url?>1841" src="<?=$pic_url?>1841&size=120" alt="1841">
    </td>
  </tr>
</table>
  </div>
</div>

  </div>
  <!-- 底部固定区域 -->
  <div class="layui-footer  layui-anim layui-anim-up">
    © layui.com - 底部固定区域
  </div>
</div>
<!-- script -->
<script src="<?=$cdn?>select2/4.0.0/js/select2.min.js"></script>
<script src="<?=$cdn?>select2/4.0.0/js/i18n/zh-CN.js"></script>
<script defer="defer">
// page init
layui.use(['layer','form','code','element'], function(){
  mylog('page','init');

  var layer = layui.layer,
  form = layui.form,
  $ = layui.$;
  // layui.code({about:false,encode: true});

  // todo : 菜单收起
  // $('.menu-switch').click(function(){
  //   alert();
  //   $('.layui-side').toggleClass('side-menu');
  // })
  // select2
  $('#js-sex').select2({
    width:100
    ,language: "zh-CN"
    // ,placeholder: "== 状态 =="
  }).val(1).trigger('change');

  // event
  $('#js-test').click(function(e) {
    layer.msg('Hello World');
    $('select[name=city]').val('2');//.trigger('change');
    form.render('select','city-warp');
  });
  form.on('select(city)', function(data){
    console.log(data.elem); //得到select原始DOM对象
    console.log(data.value); //得到被选中的值
    console.log(data.othis); //得到美化后的DOM对象
  });

  layer.photos({ photos: '#img-warp' });
});
</script>
</body>
</html>