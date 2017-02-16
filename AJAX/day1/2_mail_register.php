<?php
/*
*接收客户端提交的phone、pwd，添加到数据库 —— 若手机号已经存在，则不能添加，提示已经注册过，无需重复注册
*/
@$phone = $_REQUEST['phone'] or die('phone required');
@$pwd = $_REQUEST['pwd'] or die('pwd required');

require('1_init.php');

//先判断指定的phone在数据库中是否已经存在
$sql = "SELECT * FROM mail WHERE phone='$phone'";
$result = mysqli_query($conn,$sql);
//DQL: false 或 结果集
if($result===false){  //SQL执行失败
  echo "<h3>SQL语句执行失败！</h3>";
  echo "请检查SQL语法：$sql";
}else {		//SQL执行成功
	$row = mysqli_fetch_row($result); //抓取一行
	if($row===null){ //未查询到任何记录
		$now = time()*1000;
		$sql = "INSERT INTO mail VALUES(NULL,'$phone','$pwd','$now')";
		$result = mysqli_query($conn,$sql);
		//DML: false 或 true
		if($result===false){	//INSERT执行失败
			echo "<h3>注册失败！</h3>";
			echo "请检查SQL语法：$sql";
		}else {	//INSERT执行成功
			echo "<h3>注册成功！</h3>";
			echo "您在系统中编号为：".mysqli_insert_id($conn);
		}
	}else {  //查询到一行记录
		echo "<h3>注册失败！</h3>";
		echo "原因：该手机号已经注册过！";
	}
}