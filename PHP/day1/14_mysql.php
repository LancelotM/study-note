<?php
//使用PHP代码操作MySQL服务器
//接收客户端提交的变量
//var_dump( $_REQUEST  );  //PHP预定义变量,
//$_REQUEST 是一个预定义的数组，其中保存着客户端提交的所有请求数据
$i = $_REQUEST['cid'];
$n = $_REQUEST['cname'];
$c = $_REQUEST['count'];



//(1)连接到MySQL服务器
$conn = mysqli_connect('127.0.0.1', 'root', "", 'dangdang', 3306);

//(2)发送SQL命令提交给MySQL服务器
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);  

$sql = "INSERT INTO dd_category VALUES('$i','$n','$c')";
$result = mysqli_query($conn, $sql);

//(3)查看MySQL服务器返回的执行结果
if($result){		//TRUE
	echo "新的书籍分类插入成功！";
}else {				//FALSE
	echo "书籍分类插入失败！请检查SQL：$sql";
}


