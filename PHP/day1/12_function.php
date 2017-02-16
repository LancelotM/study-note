<?php
$msg = 'hello';

//返回一个随机的表示颜色的字符串
function randColor(){
	global $msg;  //声明使用一个全局变量
	echo $msg;
	$r = rand(0, 255);
	$g = rand(0, 255);
	$b = rand(0, 255);
	return "rgb($r, $g, $b)";
}

echo randColor();
