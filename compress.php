<?php

if($argc <= 1) die('please input the string!' . PHP_EOL);

$word = $argv['1'];

/**
 * 1.转化为ASCII
 * 2.将ASCII码作为字符串连接
 * 3.每10位拆分字符串
 * 4.将拆分的10位十进制数字转换为36进制，默认是7位，余位补"."
 */
$result = getBytes($word);
$result = join($result);
for($i=0;$i<=strlen($result)/10;$i++){
    $tmp[] = substr($result, $i*10, 10);
    $num = base_convert(substr($result, $i*10, 10), 10, 36);
    $num = str_pad($num, 7, '.');
    $str[] = $num;
}
$str = join($str);
echo $str;
echo PHP_EOL;

function getBytes($string) { 
    $bytes = array(); 
    for($i = 0; $i < strlen($string); $i++){ 
         $bytes[] = ord($string[$i]); 
    } 
    return $bytes; 
}
