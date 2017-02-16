<?php
/***
*接收客户端提交的pic, uname, price，添加到数据库
*/
@$pc = $_REQUEST['pic'] or die('pic required');
@$nm = $_REQUEST['uname'] or die('uname required');
@$pr = $_REQUEST['price'] or die('price required');
$tm = time()*1000;

//包含数据库连接初始化页面
require('0_init.php');

$sql = "INSERT INTO udisk VALUES(NULL,'$pc','$nm','$pr','$tm')";
$result = mysqli_query($conn,$sql);

//查看执行结果，如果成功输出U盘编号
//DML: false / true
if($result===false){
	echo "<h3>添加失败！</h3>";
	echo "请检查SQL：$sql";
}else {
	echo "<h3>添加成功！</h3>";
	echo "新U盘在数据库中的编号：" . mysqli_insert_id($conn);
}

echo "<hr>";
echo "<a href='4_udisk_select.php'>查看所有的U盘</a>";