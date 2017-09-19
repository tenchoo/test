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
    <div id="js-hide-menu" class="switch-menu-wrap"><i class="fa fa-bars"></i> </div>
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
    <div class="skin-box">
      <a href="#" class="skin layui-nav-img" data-skin="df" data-ref="393D49"></a>
      <a href="#" class="skin layui-nav-img" data-skin="cyan" data-ref="2F4056"></a>
      <a href="#" class="skin layui-nav-img" data-skin="blue" data-ref="169fe6"></a>
      <a href="#" class="skin layui-nav-img" data-skin="green" data-ref="009688"></a>
      <a href="#" class="skin layui-nav-img" data-skin="red" data-ref="fb6e52"></a>
      <a href="#" class="skin layui-nav-img" data-skin="orange" data-ref="FFB800"></a>
      <a href="#" class="skin layui-nav-img" data-skin="gray" data-ref="eeeeee"></a>
    </div>
    <p class="layui-label">用户信息</p>
    <label for="" class="layui-btn layui-btn-danger" id="js-dels">批量删除</label>
    <table id="demo" lay-filter="demo"></table>
  </div>
  <!-- 底部固定区域 -->
  <div class="layui-footer layui-anim layui-anim-up">
    © layui.com - 底部固定区域
  </div>
</div>
<!-- script -->
<script defer="defer">
// page init
layui.use(['layer','table'], function(){
  mylog('page','init');

  var layer = layui.layer,
  table = layui.table,
  $ = layui.$;

  //执行渲染
  table.render({ elem: '#demo'
    ,id:'demo'
    ,url: 'ajax.php'
    ,where: { token: 'sasasas', op: 'user' }
    ,method: 'get'
    ,request: { pageName: 'page',limitName: 'size' }
    ,limits: [10,30,60]
    ,limit: 10
    ,loading: true
    ,page:true
    ,cols:  [[
      {checkbox: true,rowspan: 2, width: 50,fixed: 'left'} //LAY_CHECKED: true,
      ,{field: 'id', title: 'ID', width: 80,rowspan: 2,sort:true,fixed: 'left'}
      ,{field: 'username', title: '姓名', width: 120,rowspan: 2,templet:
      '#usernameTpl'}
      ,{field: 'sex', title: '性别', width: 75,rowspan: 2}
      ,{field: 'city', title: '城市', width: 75,rowspan: 2}
      ,{align: 'center',title: '其他信息', colspan: 4}
    ],[
      {field: 'sign', title: '签名', width: 200}
      ,{field: 'logins', title: '登陆次数', width: 130,templet: '<div><a href="/detail/{{ d.id }}" class="layui-table-link">{{ d.logins }}</a> 次</div>'}
      ,{field: 'score', title: '得分',width: 120,edit: "text",sort:true}
      ,{fixed: 'right', width:250, align:'center', toolbar: '#barDemo'}
    ]]
    ,done: function(res, page, count){
      //异步 res为接口返回,直接赋值 res为：{data: [], count: 99}
      console.log(res);
      console.log(page,count);
    }
  });
  //表格时间
  table.on('tool(demo)', function(obj){
    var data     = obj.data; //获得当前行数据
    var layEvent = obj.event; //获得 lay-event 对应的值
    var tr       = obj.tr; //获得当前行 tr 的DOM对象

    mylog(data,tr);
    if(layEvent === 'detail'){ //查看
      //do somehing
      alert('detail');
    } else if(layEvent === 'del'){ //删除
      myconfirm('真的删除行么', function(index){
        obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
        layer.close(index);
        //向服务端发送删除指令
      });
    } else if(layEvent === 'edit'){ //编辑
      //do something

      //同步更新缓存对应的值
      obj.update({
        username: '123'
        ,id: 'xxx'
      });
    }
  });
  // 表格多选事件 下面主动获取
  // var op_ids = [];
  // table.on('checkbox(demo)', function(obj){
  //   if(obj.type == 'all'){
  //     if(obj.checked){

  //     }else{
  //       op_ids = [];
  //     }
  //   }else if(obj.type == 'one'){
  //     if(obj.checked){
  //       op_ids.push(obj.data.id);
  //     }else{
  //       op_ids.splice($.inArray(obj.data.id, op_ids), 1);
  //     }
  //   }
  //   // mylog('op_ids',op_ids);
  // });
  $('#js-dels').click(function(event) {
    // mylog('op_ids',op_ids);
    var cs = table.checkStatus('demo'); //test即为基础参数id对应的值
    // console.log(checkStatus.data) //获取选中行的数据
    // console.log(checkStatus.data.length) //获取选中行数量，可作为是否有选中行的条件
    // console.log(checkStatus.isAll ) //表格是否全选
    var op_ids = [];
    cs.data.forEach(function(val,index){
      op_ids.push(val.id);
    });
    mylog('op_ids',op_ids.join(','));
    // table.reload('demo');
  });
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