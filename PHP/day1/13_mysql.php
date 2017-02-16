<?php
//使用PHP代码操作MySQL服务器
//(1)连接到MySQL服务器
$conn = mysqli_connect('127.0.0.1', 'root', "", 'dangdang', 3306);

//var_dump($conn);

//(2)发送SQL命令提交给MySQL服务器
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);  //提交语句

$sql = "INSERT INTO dd_category VALUES(60,'美学','9')";
$result = mysqli_query($conn, $sql);

//(3)查看MySQL服务器返回的执行结果
if($result){		//TRUE
	echo "新的书籍分类插入成功！";
}else {				//FALSE
	echo "书籍分类插入失败！请检查SQL：$sql";
}


