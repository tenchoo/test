if('undefined' == typeof(NProgress)){
  mylog('需要 NProgress');
}else{
  NProgress.start();
}

// 自定义控制台 输出
function mylog(){
  var msg1 = ('undefined' != typeof arguments[0]) ? arguments[0] : '';
  // var type = ('undefined' != typeof arguments[2]) ? arguments[2] : 'log';
  //console[type](msg1,msg2);
  if('undefined' != typeof arguments[1]){
    console.log(msg1,arguments[1])
  }else{ console.error(msg1) }
}

// 检查jquery
if('undefined' == typeof($)){
  if('undefined' ==  typeof(layui)){
    mylog('需要依赖 jquery');
  }
}

// jquery scojs
function myalert(){
  if(!$.scojs_message){
    mylog('需要依赖 scojs');    return ;
  }
  var msg  = ('undefined' != typeof arguments[0]) ? arguments[0] : '',
  type = ('undefined' != typeof arguments[1]) ? arguments[1] : false;

  $.scojs_message(msg, type ? $.scojs_message.TYPE_OK : $.scojs_message.TYPE_ERROR);
}
// layui : layer-msg
function mymsg(){
  var msg  = ('undefined' != typeof arguments[0]) ? arguments[0] : '',
  icon = ('undefined' != typeof arguments[1]) ? arguments[1] : '';
  if('' === icon){
    return layer.msg(msg);
  }else{
    return layer.msg(msg, {icon: parseInt(icon)});
  }
}
// web存储 : 一直有效
function mylocal(name){
  return ('undefined' != typeof arguments[1]) ? localStorage.setItem(name,arguments[1]) : localStorage.getItem(name);
}
// web存储 : session周期
function mysession(name){
  return ('undefined' != typeof arguments[1]) ? sessionStorage.setItem(name,arguments[1]) : sessionStorage.getItem(name);
}
// redirect : url time
function goTo() {
  var url = ('undefined' != typeof arguments[0]) ? arguments[0] : '',
  time    = ('undefined' != typeof arguments[1]) ? arguments[1] : 0;
  if(time >0){
    setTimeout(function() {
      if(url) location.href = url;
      else location.reload();
    }, time);
  }else{
    if(url) location.href = url;
    else location.reload();
  }
}
//layui
function myconfirm(con,call){
  con = con || '确认要执行该操作吗?';
  call = call || function(index){ };
  return layer.open({
    type:1
    ,closeBtn: false
    ,title: false
    ,shade: 0.6
    // ,resize: false
    // ,btnAlign: 'c'
     ,area: ['600px']
    ,id:'unique'
    ,moveType: 0
    ,btn: ['确定','取消']
    // ,moveType: 0
    ,shadeClose: true
    ,content: '<div style="padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+con+'</div>'
    ,yes: call
  });
}

// common init 一般直接写在一个js文件中
layui.use(['layer'], function(){
  mylog('common','init');
  // NProgress.set(0.4);
  // NProgress.inc();
  NProgress.done();
});
/**
 * 2017-09-14 16:15:14
 */
// window.console = window.console || (function(){
//   var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
//   return c;
// })();

(function($, w) {

  // 风格选择与事件处理
  var skinpath = './css/skin/';
  var skin = mylocal("skin");
  var menu = mylocal("current_menu");
  // skin 初始化
  skin  && $("#style-color").attr("href", skin);
  // skin 选择
  $(function() {
    // 给每个风格选择框 上色加事件
    var $skinbox = $('.skin');
    if($skinbox.length){
      var $link    = $('#style-color');
      $skinbox.each(function(i) {
        $(this).css({ backgroundColor: '#' + $(this).data('ref') })
      })
      $skinbox.click(function(e) {
        var color = $(this).data('ref');
        var skin  = skinpath + $(this).data('skin') + '.css';
        $link.attr('href', skin);
        mylocal("color", color);
        mylocal("skin", skin);
        return false;
      });
    }
    // head menu
    $('#js-hide-menu').click(function(){
      $('.layui-side').toggleClass('hide');
      $('.layui-footer').toggleClass('hide');
      $('.layui-body').toggleClass('change');
    })
  });


  // alertTODO error
  function alertTODO(msg) {
    msg = msg || "此功能未实现";
    $.scojs_message(msg, $.scojs_message.TYPE_ERROR);
  }
  // 进入全屏
  function requestFullScreen() {
    var de = document.documentElement;
    if (de.requestFullscreen) {
      de.requestFullscreen();
    } else if (de.mozRequestFullScreen) {
      de.mozRequestFullScreen();
    } else if (de.webkitRequestFullScreen) {
      de.webkitRequestFullScreen();
    }
  }
  // 退出全屏
  function exitFullscreen() {
    var de = document;
    if (de.exitFullscreen) {
      de.exitFullscreen();
    } else if (de.mozCancelFullScreen) {
      de.mozCancelFullScreen();
    } else if (de.webkitCancelFullScreen) {
      de.webkitCancelFullScreen();
    }
  }

  // select全选
  function selectall(that,sel){
    if($(that).prop('checked')){
      $(sel).prop('checked',true);
    }else{
      $(sel).prop('checked',false);
    }
  }

  // ajax 返回处理
  function handleAjax(data,that){
    data = JSON.parse(data);
    mylog('ajax-get-return',data);
    var msg = data.msg,
    delay   = data.delay,
    url     = data.url;
    if (0 === data.code) { // success
      // var dat = data.data;
      !$(that).hasClass('no-alert') && myalert(delay ? msg + ' 页面即将自动跳转~' : msg, 1);
      !$(that).hasClass('no-refresh') && goTo(url,delay);
    } else { // error
      myalert(msg, 0);
      !url && mylog(data.code+' : '+msg);
      url && getTo(url,delay);
    }
  }
  w.myUtils = {
    goTo: goTo,
    alertTODO: alertTODO,
    exitFullscreen: exitFullscreen,
    requestFullscreen: requestFullScreen,
    selectall:selectall,
    ajaxpost:function ajaxpost(that, target, query) {
      $.post(target, query).always(function() {
        }).done(function(data) {
        handleAjax(data,that)
      });
    }
  };

  $(function() {
    //nprogress
    $(document).ajaxStart(function() {
      temp_npro = layer.load();
      // NProgress.start();
    }).ajaxStop(function() {
      layer.close(temp_npro);
      // NProgress.done();
    }).ajaxComplete(function() {
      // NProgress.inc();
    });
    //正常confirm
    $(".normal-get").click(function(ev){
      $item = $(ev.target);
      if ($item.hasClass('confirm')) {
        myconfirm($item.data('content') || '',function(index) {
          layer.close(index);
          $(".normal-get").removeClass("confirm").click();
        });
        ev.preventDefault();
        return false;
      }
    });

    // $(".dropdown-toggle.avatar").hover(function() {
    //     $(".dropdown-toggle.avatar").dropdown("toggle");
    // }).next(".dropdown-menu").hover(function() {
    //     $(".dropdown-toggle.avatar").dropdown("toggle");
    // });

    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      if ($fullText.text() == '全屏') {
        w.myUtils.requestFullscreen();
        $fullText.text('ESC');
      } else {
        w.myUtils.exitFullscreen();
        $fullText.text('全屏')
      }
    });

    //todo : window resize
    // $(window).resize(function() {
    //   console.log("=window resize=");
    //   var width = $(".admin-main").outerWidth() - $('.admin-sidebar').outerWidth() - 30;
    //   if (width > 0) {
    //     $(".admin-main-content").outerWidth(width);
    //   }
    // });

    //一般是select 框
    $(".sle_ajax_post").change(function(ev){
      var item  = ev.target;
      var $item = $(item);
      var query = $item.serialize();
      if (item.hasClass('confirm')) {
        myconfirm($item.data('content') || '',function(index) {
          layer.close(index);
          sleajaxpost(query, item);
        });
      }else{
        sleajaxpost(query, item);
      }
    })

    function sleajaxpost (query, that){
      var target = $(that).data("href");
      $.post(target, query).always(function() {
      }).done(function(data) {
          handleAjax(that,target);
      });
    }

    //ajax get请求
    $('.ajax-get').click(function(ev) {
      mylog("ajax-get",'');
      ev.preventDefault();
      var target,that = this,$this = $(this);
      if ((target = $this.attr('href')) || (target = $this.attr('url'))) {
        if ($this.hasClass('confirm')) {
          myconfirm($this.data('content') || '',function(index) {
            layer.close(index);
            ajaxget(that, target);
          });
        }else{
          ajaxget(that, target);
        }
      }
      return false;
    });

    //return [code,data,msg,url];
    //.no-refresh 将不跳转
    function ajaxget(that, target) {
      $.get(target).always(function() {
        }).success(function(data) {
        handleAjax(data,that);
      });
    }
    //依赖jquery
    //1 : .xx a[target-form=.xx].ajax-post[href=.../url=...]
    //2 : .xx[action=...] a[target-form=.xx].ajax-post[type=submit]
    //3 : .hide-data
    //return [code,date,msg,url]
    $('.ajax-post').click(function() {
      mylog("ajax-post",'');
      var that = this,$this = $(this);
      var target, query, form;
      var target_form = $this.attr('target-form');
      var need_confirm = false;
      if (($this.attr('type') == 'submit') || (target = $this.attr('href')) || (target = $this.attr('url'))) {
        form = $('.'+target_form);
        // 是否验证
        // if($.validator && (form.hasClass("validate-form") || form.hasClass("validateForm"))) {
        //     if(!form.valid()){
        //         myalert('表单验证不通过！',0);
        //         return false;
        //     }
        // }
        if ($this.attr('hide-data') === 'true') {
          //以隐藏数据作为参数
          form = $('.hide-data');
          query = form.serialize();
        } else if (form.get(0) == undefined) {
          mylog('未知表单');
          return false;
        } else if (form.get(0).nodeName == 'FORM') {
          // target-form对应 form
          if ($this.attr('url') !== undefined || $this.attr("href") !== undefined) {
            target = $this.attr('url') || $this.attr("href");
          } else {
            target = form.get(0).action;
          }
          query = form.serialize();
        } else if (form.get(0).nodeName == 'INPUT' || form.get(0).nodeName == 'SELECT' || form.get(0).nodeName == 'TEXTAREA') {
          //以input 为触发节点
          form.each(function(k, v) {
            if (v.type == 'checkbox' && v.checked == true) {
              nead_confirm = true;
            }
          })
          query = form.serialize();
        } else {
          query = form.find('input,select,textarea').serialize();
        }
      }

      if ($this.hasClass('confirm')) {
        myconfirm($that.data('content') || '',function(index) {
          layer.close(index);
          myUtils.ajaxpost(that, target, query);
        });
      } else {
        myUtils.ajaxpost(that, target, query);
      }
      return false;
    }); //END ajax-post

    $(window).resize();
  }) //end $.ready
})(jQuery, window);