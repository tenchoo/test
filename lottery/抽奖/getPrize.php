<?php

$prize_arr = array(
    '0' => array('id' => 1, 'name'=>'奖品1', 'prize' => '一等奖', 'v' => 5,'icon' => 'images/1.png'),
    '1' => array('id' => 2, 'name'=>'奖品2','prize' => '二等奖', 'v' => 5,'icon' => 'images/2.png'),
    '2' => array('id' => 3, 'name'=>'奖品3','prize' => '三等奖', 'v' => 5,'icon' => 'images/3.png'),
    '3' => array('id' => 4, 'name'=>'奖品4','prize' => '四等奖', 'v' => 5,'icon' => 'images/4.png'),
    '4' => array('id' => 5, 'name'=>'奖品5','prize' => '五等奖', 'v' => 5,'icon' => 'images/5.png'),
    '5' => array('id' => 6, 'name'=>'奖品6','prize' => '六等奖', 'v' => 5,'icon' => 'images/6.png'),
    '6' => array('id' => 7, 'name'=>'奖品7','prize' => '七等奖', 'v' => 5,'icon' => 'images/7.png'),
    '7' => array('id' => 8, 'name'=>'奖品8','prize' => '八等奖', 'v' => 5,'icon' => 'images/8.png'),
);

echo json_encode($prize_arr);