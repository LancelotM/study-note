<?php
/**
*接收客户端提交的修改后的汽车信息，更新到数据库
*/
@$cid=$_REQUEST['cid'] or die('cid required');
@$cname=$_REQUEST['cname'] or die('cname required');
@$pic=$_REQUEST['pic'] or die('pic required');
@$price=$_REQUEST['price'] or die('price required');
@$isonsale=$_REQUEST['isonsale'];
if($isonsale===null){
	die('isonsale required');
}
@$birthday=$_REQUEST['birthday'];

//连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//提交SQL
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);
$sql = "UPDATE car SET cname='$cname',pic='$pic',price='$price',isonsale='$isonsale',birthday='$birthday' WHERE cid='$cid'";
$result = mysqli_query($conn,$sql);

//查看执行结果
//DML:  false  或 true
if($result===false){
	echo '<h1>汽车数据修改失败</h1>';
	echo "请检查SQL: $sql";
}else {
	echo '<h1>汽车数据修改成功</h1>';
	echo '修改操作影响的行数：'.mysqli_affected_rows($conn);
}


echo "<hr>";
echo "<a href='6_car_select.php'>查看所有汽车</a>";
