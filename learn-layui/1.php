<?php require 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> layer </title>

  <link rel="stylesheet" href="<?=$cdn?>layui/2.1.3/css/layui.css">
  <link rel="stylesheet" href="<?=$cdn?>nprogress/nprogress.css">
  <link rel="stylesheet" href="<?=$cdn?>select2/4.0.0/css/select2.min.css">
  <link rel="stylesheet" href="<?=$cdn?>scojs/1.0.2/css/sco.message.css">
  <link rel="stylesheet" href="http://115.29.220.243/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .w300{ width:300px; }
  .img-warp img{
    height:120px !important;cursor:pointer;
  }
  </style>

  <script src="<?=$cdn?>jquery/1.11.0/jquery.min.js"></script>
  <script src="<?=$cdn?>layui/2.1.3/layui.js"></script><!-- 按需加载 -->
  <script src="<?=$cdn?>nprogress/nprogress.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.modal.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.message.js"></script>
  <script src="<?=$cdn?>scojs/1.0.2/js/sco.confirm.js"></script>
  <script src="common.js" defer="defer"></script>
</head>
<body>

<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">LOGO / SITENAME</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;" id="admin-fullscreen"><i class="fa fa-arrows-alt"></i> <span class="admin-fullText">全屏</span> </a>
      </li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <!-- <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">所有商品</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="javascript:;">列表三</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">列表一</a></dd>
            <dd><a href="javascript:;">列表二</a></dd>
            <dd><a href="">超链接</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul> -->
    </div>
  </div>

  <div class="layui-body">


<p>
  <span class="layui-breadcrumb">
    <a href="">首页</a>
    <a href="">国际新闻</a>
    <a href="">亚太地区</a>
    <a><cite>正文</cite></a>
  </span>
</p>

<!-- body start -->
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
      <button class="layui-btn ajax-get" href="ajax.php" >get提交</button>
      <button target-form="post-form" class="layui-btn ajax-post" href="ajax.php" >post提交</button>
      <a href="javascript:history.go(-1)" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
    </form>
  </div>
</div>

<table>
  <tr><th></th></tr>
  <tr>
    <td class="img-warp" id="img-warp">
      <img layer-src="http://api.ryzcgf.com/public/index.php/picture/index?id=1690" src="http://api.ryzcgf.com/public/index.php/picture/index?id=1690&size=120" alt=""  title="点击查看原图">
      <img layer-src="http://api.ryzcgf.com/public/index.php/picture/index?id=1841" src="http://api.ryzcgf.com/public/index.php/picture/index?id=1841&size=120" alt="" title="点击查看原图">
    </td>
  </tr>
</table>
<!-- body end -->


  </div>
  <!-- 底部固定区域 -->
  <!-- <div class="layui-footer">
    © layui.com - 底部固定区域
  </div> -->
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