<?php
/**
*接收客户端提交的phone、pwd，执行查询，若都正确，则输出“登录成功”，更新最后一次登录时间；若有错误，则输出“用户名或密码有误”
*/
@$phone = $_REQUEST['phone'] or die('phone required');
@$pwd = $_REQUEST['pwd'] or die('pwd required');

require('1_init.php');

$sql = "SELECT * FROM mail WHERE phone='$phone' AND pwd='$pwd'";
$result = mysqli_query($conn,$sql);
//DQL: false 或 结果集
if($result===false){ //SQL语法错误
	echo "<h3>查询失败！</h3>";
	echo "请检查SQL语法：$sql";
}else {	//SQL语法正确
	//试着抓取一行记录
	$row = mysqli_fetch_assoc($result);
	if($row===null){	//没有查询结果集
		echo "<h3>登录失败！</h3>";
		echo "用户名或密码错误";
	}else {	//查询到一行记录
		echo "<h3>登录成功！</h3>";
		//修改最后一次登录时间
		$now = time()*1000;
		$mid = $row['mid'];
		$sql = "UPDATE mail SET lastLoginTime='$now' WHERE mid='$mid'";
		$result = mysqli_query($conn,$sql);
		//此处省略了$result false/true的判断
	}
}

