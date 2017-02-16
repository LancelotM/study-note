<?php
//phpinfo();  //输出PHP解释器的信息
//创建数组的语法
$list = array(10, 30, 50);   //PHP5.3-
$list = [10, 30, 50];   //PHP5.4+
//echo $list;  //错误！数组不能转换为字符串
//echo $list[0];
//echo $list[1];
//echo $list[2];
var_dump($list);

echo '<hr>';


/*****索引数组：每个元素下标是数字******/
$list = [101, 30, 5000, 'Tom', false];
//$list[5] = '万寿路';
//echo count($list);  //返回数组中元素的个数
//$list[ count($list) ] = '万寿路';
$list[] = '万寿路';		//向数组尾部添加新元素
$list[] = '13501234567';
//var_dump($list);
for($i=0; $i<count($list); $i++){
	echo "$i - $list[$i] <br>";
}
echo '<hr>';


/*****关联数组：每个元素下标是字符串******/
$list = [ 
	'eid'=>102, 
	'age'=>35, 
	'ename'=>'Tom', 
	'isMarried'=>false 
];
$list['addr'] = '万寿路';
//echo count($list);
echo $list['eid'];

