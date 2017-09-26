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