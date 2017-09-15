<?php
// 模板helper

// 模板helper - 图片
function imgTag($id,$size=120,$click=false,$tooltip=false){
    $size = $size ? $size : 120;
    $str = "<img src='".getImgUrl($id,$size)."' ";
    $style = " style ='width:".$size."px;";
    if($click){//新窗口打开
        $str .= " onclick=\"javascript:window.open('".getImgUrl($id)."');\" alt='点击新窗口查看原图' ";
        $style .= "cursor:pointer;";
    }
    if($tooltip){ //bootstrap-tooltip
        $str .= " title='点击查看原图' data-toggle='tooltip' ";
     }
     return $str.$style."' />";
 }
/**
 * 模板helper - 图片
 * @Author
 * @DateTime 2017-01-06T11:26:05+0800
 * @param    [type]  $id      [图片id]
 * @param    integer $size    [显示大小]
 * @param    boolean $click   [是否点击打开新窗口显示原图]
 * @param    boolean $tooltip [bootstrap-tooltip 或 自定义tooltip]
 * @return   [type]  [description]
 * css:
 *  /**自定义 tooltip 样式 start* /
 *.tooltip-box{
 *    position: absolute;
 *    display: block;
 *    line-height: 1.6;
 *    background-color: #fff;
 *    border: 1px solid #666;
 *    font-size: 12px;
 *    border-radius: 5px;
 *    overflow: auto;
 *    top:0px;left:0px;
 *    z-index: 9;
 *    cursor:pointer;
 *}
 *.img-show{ position:relative; }
 * /**自定义 tooltip 样式 end* /
 * html:
  * <label class="img-show">{:imgTooltip($vo,120,true)}</label>
 * js:
 * //图片自定义 tooltip start
  *  var $tip,$img;
  *  $('.img-show').click(function(e){
  *      var $this = $(this);
  *      if($this.hasClass('clicking')){
  *          $(this).removeClass('clicking').children('.tooltip-box').css('display','none');
  *      }else{
  *          $this.addClass('clicking');
  *          $img  = $this.children('img');
  *          $tip  = $this.children('.tooltip-box');
  *          if($tip.length){
  *              fixPostion($tip,$this.offset().left);
  *          }else{
  *              $html = $('<img  class="tooltip-box" />');
  *              $this.append($html);
  *              $html.attr('src',$img.data('src')).load(function() {
  *                  fixPostion($this.children('.tooltip-box'),$this.offset().left);
  *              });
  *          }
  *      }
  *  });
  *  function fixPostion($tip,offleft){
  *      var wid = $tip.width();
  *      var bwid = document.body.clientWidth;
  *      if (offleft + wid > bwid) {
  *          $tip.css({left:-(wid + offleft - bwid + 10),display:'block'});
  *      }else{
  *          $tip.css({display:'block'});
  *      }
  *  }
  *  //图片自定义 tooltip end
 */
function imgTooltip($id,$size=120,$click=false,$tooltip=false){
  $size = $size ? $size : 120;
  $str = "<img src='".getImgUrl($id,$size)."' ";
  $style = " style ='width:".$size."px;";

  if($tooltip){//bootstrap-tooltip
    if($click){
      //自带js打开
      $style .= "cursor:pointer;";
      $str .= " onclick=\"javascript:window.open('".getImgUrl($id)."');\"  alt='" .(is_string($click) ? $click : "点击新窗口查看原图") ."' ";
    }
    $str .= " title='" .(is_string($tooltip) ? $tooltip : "点击查看原图") ."' data-toggle='tooltip' ";
  }else{ //自定义tooltip
    if($click){
      //自定义js打开 - 见模板
      $str .= " class='img-click'  alt='" .(is_string($click) ? $click : "点击新窗口查看原图") ."' ";
      $style .= "cursor:pointer;";
    }
    $str .= " data-src='".getImgUrl($id)."' ";
  }
  return $str.$style."' />";
}
function w_datatree($parent,$hasChildren,$checkedID=0,$showCode=0){

  if($hasChildren){
    $map['parents'] = array('like','%'.$parent.',%');
    $result = (new \app\src\system\logic\DatatreeLogicV2())->queryNoPaging($map);
    $list = \app\src\admin\helper\MenuHelper::toFormatTree($result,'name','id','parentid',$parent);
  }else{
    $map = array('parentid'=>$parent);
    $list = (new \app\src\system\logic\DatatreeLogicV2())->queryNoPaging($map);
  }
  echo \think\View::instance()->fetch("default/Widget/datatree",['list'=>$list,'checkedID'=>$checkedID,'showCode'=>$showCode]);
}
function qw_datatree($parent,$hasChildren,$checkedID=0,$showCode=0){

  if($hasChildren){
    $map['parents'] = array('like','%'.$parent.',%');
    $result = (new \app\src\system\logic\DatatreeLogicV2())->queryNoPaging($map);
    $list = \app\src\admin\helper\MenuHelper::toFormatTree($result,'name','id','parentid',$parent);
  }else{
    $map = array('parentid'=>$parent);
    $list = (new \app\src\system\logic\DatatreeLogicV2())->queryNoPaging($map);
  }
  echo \think\View::instance()->fetch("default/Widget/quantitydatatree",['list'=>$list,'checkedID'=>$checkedID,'showCode'=>$showCode]);
}