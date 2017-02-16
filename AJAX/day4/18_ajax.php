<?php
header('Content-Type: application/json');

//PHP关联数组
$arr = [
	'ename'=> 'Tom',
	'age'=>20
];

//把PHP关联数组编码为JSON格式字符串，结果是JSON:{}
echo  json_encode($arr);


/*
//PHP索引数组
$arr = [ 'Tom',20 ];
//把PHP索引数组编码为JSON格式字符串，结果是JSON:[]
echo  json_encode($arr);
*/