<?php

//db_object to array
function Obj2Arr($r,$key=false){
  $l = [];
  foreach ($r as $v) {
    $data = $v->getData();
    if($key) $l[$data[$key]] = $data;
    else $l[] = $data;
  }
  return $l;
}

//将数组的某个键作为索引key
function changeArrayKey($arr = null,$k='id'){
  $r = [];
  foreach ($arr as $v) {
      $r[$v[$k]] = $v;
  }
  return $r;
}
//取出数组的某一列
function getArrColumn($arr,$val_f='',$key_f=''){
  if(version_compare(PHP_VERSION,'5.5.0','>=')){
      return array_column($arr, $val_f,$key_f); //php5.5+
  }else{
    $r = [];
    foreach ($arr as $v) {
      if($val_f && isset($v[$val_f])){
        if($key_f && isset($v[$key_f])){
          $r[$v[$key_f]] = $v[$val_f];
        }else{
          $r[] = $v[$val_f];
        }
      }
    }
    return $r;
  }
}
/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pk
 * @param string $pid parent标记字段
 * @param string $child
 * @param int $root
 * @return array
 * @internal param string $level level标记字段
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0) {
    // 创建Tree
  $tree = array();
  if (is_array($list)) {
    // 创建基于主键的数组引用
    $refer = array();
    foreach ($list as $key => $data) {
      $refer[$data[$pk]] = &$list[$key];
    }
    foreach ($list as $key => $data) {
      // 判断是否存在parent
      $parentId = $data[$pid];
      if ($root == $parentId) {
        $tree[] = &$list[$key];
      } else {
        if (isset($refer[$parentId])) {
          $parent = &$refer[$parentId];
          $parent[$child][] = &$list[$key];
        }
      }
    }
  }
  return $tree;
}