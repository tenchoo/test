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


require 'header.php';
?>
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