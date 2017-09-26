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
    <div class="skin-box">

      <a href="#" class="skin layui-nav-img" data-skin="df" data-ref="393D49"></a>
      <a href="#" class="skin layui-nav-img" data-skin="cyan" data-ref="2F4056"></a>
      <a href="#" class="skin layui-nav-img" data-skin="blue" data-ref="169fe6"></a>
      <a href="#" class="skin layui-nav-img" data-skin="green" data-ref="009688"></a>
      <a href="#" class="skin layui-nav-img" data-skin="red" data-ref="fb6e52"></a>
      <a href="#" class="skin layui-nav-img" data-skin="orange" data-ref="FFB800"></a>
      <a href="#" class="skin layui-nav-img" data-skin="gray" data-ref="eeeeee"></a>
    </div>
    <fieldset class="layui-elem-field">
      <legend>用户信息</legend>
      <div class="layui-field-box">

        <blockquote class="layui-elem-quote">注意: xxx</blockquote>
        <label for="" class="layui-btn" id="js-add"><i class="layui-icon">&#xe654;</i> 添加</label>
        <label for="" class="layui-btn layui-btn-danger" id="js-dels">批量删除</label>
        <label for="" class="layui-btn layui-btn-warm" id="js-checks">批量审核</label>
        <table id="demo" lay-filter="demo"></table>
      </div>
    </fieldset>
  </div>
  <!-- 底部固定区域 -->
  <div class="layui-footer layui-anim layui-anim-up">
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
  table.render({ elem: '#demo'
    ,width:1100
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
      ,{fixed: 'right', width:250, align:'left', toolbar: '#barDemo'}
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
  $('#js-dels,#js-checks').click(function(event) {
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
    if(op_ids.length){

    }else{
      myalert('请先选择 !',0);
      return false;
    }
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
  <a class="layui-btn layui-btn-mini" lay-event="detail"><i class="layui-icon">&#xe705;</i>查看</a>
  <a class="layui-btn layui-btn-mini" lay-event="edit"><i class="layui-icon">&#xe642;</i>编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del"><i class="layui-icon">&#xe642;</i>删除</a>
  {{#  if(d.id > 10005){ }}
    <a class="layui-btn layui-btn-mini" lay-event="check">审核</a>
  {{#  } }}
</script>
</body>
</html>