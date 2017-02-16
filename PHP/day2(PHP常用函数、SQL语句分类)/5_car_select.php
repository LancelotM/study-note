<?php
/**
*在一个表格中向客户端输出所有的汽车信息
*/
//连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//提交SQL语句
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

$sql = "SELECT * FROM car";
$result = mysqli_query($conn,$sql);

/*
mysqli_query()的返回值：
(1)DML: insert delete update
	失败：false	
	成功：true
(2)DQL: select
	失败：false
	成功：查询结果集描述对象
*/
if($result===false){
	echo "<h1>查询失败！</h1>";
	echo "请检查SQL语句：$sql";
	die();
}else {		//查询成功
	//var_dump($result);
	//查询结果的描述对象，没有数据本身

	//读取数据1： 抓取一行,返回一个索引数组
	//$row = mysqli_fetch_row($result);
	
	//读取数据2： 抓取一行,返回一个关联数组
	//$row = mysqli_fetch_assoc($result);
	//var_dump($row);
	/*
	$row = mysqli_fetch_assoc($result);
	var_dump($row);
	$row = mysqli_fetch_assoc($result);
	var_dump($row);
	$row = mysqli_fetch_assoc($result);
	var_dump($row);
	$row = mysqli_fetch_assoc($result);
	var_dump($row); //没有了，返回NULL
	*/

	//读取数据3： 抓取所有行——二维数组
	//$list = mysqli_fetch_all($result);
	$list = mysqli_fetch_all($result, MYSQLI_ASSOC);  //常量的值为1
	var_dump($list);
}