<?php

if($argc <= 1) die('please input the string!' . PHP_EOL);

$str = $argv['1'];

/**
 * 1.按照7位切分成数组
 * 2.去掉切分单位中字符串中的[.]
 * 3.将之后的单位36进制转换为10进制
 * 4.将字符串连接，并且通过ASCII转换回中文
 */
$result = getChar($str);
foreach ($result as &$v) {
	$v = str_replace('.', '', $v);
}
foreach ($result as $v2) {
	$str2[] = base_convert($v2, 36, 10);
}
$str2 = join($str2);
for($i=0;$i<strlen($str2)/3;$i++){
	$str3[] = chr(substr($str2, $i*3, 3));
}
foreach ($str3 as $v3) {
	echo $v3;
}
echo PHP_EOL;


function getChar($str){
	$arr = array();
	for($i=0;$i<strlen($str)/7;$i++){
		$arr[] = substr($str, $i*7, 7);
	}
	return $arr;
}