<?php
/*
*接收客户端提交的phone，向客户端输出“cunzai”或“bucunzai”；使用浏览器同步请求该页面进行测试
*/
header('Content-Type: text/plain');

//接收客户端请求数据
@$p = $_REQUEST['phone'] or die('phone required');

//连接到MySQL，提交SQL
require('1_init.php');
$sql = "SELECT * FROM mail WHERE phone='$p'";
$result = mysqli_query($conn,$sql);
//DQL: false / 结果集

//此处省略了执行结果为false的验证
$row = mysqli_fetch_row($result);
if($row===null){  //结果集中没有数据
	echo "bucunzai";
}else {
	echo "cunzai";
}




