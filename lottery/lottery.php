<?php
header('content-type:text\html;charset=utf-8');
$arr = array(
	1=>array('精美花瓶1','1.jpg'),
	2=>array('精美花瓶2','1.jpg'),
	3=>array('精美花瓶3','1.jpg'),
	4=>array('精美花瓶4','1.jpg'),
	5=>array('精美花瓶5','1.jpg'),
	6=>array('精美花瓶6','1.jpg'),
	7=>array('精美花瓶7','1.jpg'),
	8=>array('精美花瓶8','1.jpg')
);
echo json_encode($arr);