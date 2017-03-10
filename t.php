<?php

$t = 52;
echo floor($t/10).'-';
echo ceil($t%10);
exit;
$result = [
	[0 => '127:560',
    2 => '127:561',],
   [0 => '128:562',
    1 => '128:563',],
];

$res =  [];
$flag = [];
$i = 0;
foreach ($result as $k => $v) {
    foreach($v as $kk => $vv){
        $temp = explode(':',$vv);
        $flag[$temp[0]][] = $temp[1];
        // if(empty($flag[$tmp[0]])){
        //     $flag[$tmp[0]] = $i;
        //     $i++;
        //     $res[$flag[$tmp[0]]]['id'] = $tmp[0];
        // }
        // if(empty($res[$flag[$tmp[0]]]['vid'])){
        //     $res[$flag[$tmp[0]]]['vid'] = [];
        // }
        // array_push($res[$flag[$tmp[0]]]['vid'],$tmp[1]);
    }
}
foreach ($flag as $k => $v) {
	$res[$i]['id']=$k;
	$res[$i]['vid']=$v;
	$i++;
}

// [{"id":"127","vid":["560"]},{"id":"127","vid":["561"]},{"id":"128","vid":["562","563"]}]
print_r($res);