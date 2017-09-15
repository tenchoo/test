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