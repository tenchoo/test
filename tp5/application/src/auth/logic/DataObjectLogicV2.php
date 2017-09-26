<?php
/**
 * Author      : rainbow <hzboye010@163>
 * DateTime    : 2017-01-16 13:44:56
 * Description : [Description]
 */

namespace app\src\auth\logic;
use app\src\base\logic\BaseLogicV2;
use app\src\auth\model\DataObject;

/**
 * [simple_description]
 *
 * [detail]
 *
 * @author  rainbow <hzboye010@163>
 * @package app\src\logic
 * @example
 */
class DataObjectLogicV2 extends BaseLogicV2 {
  // init
  protected function _init(){
    $this->setModel(new DataObject());
  }
}