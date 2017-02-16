<?php
/***
*接收客户端提交的uname和upwd，返回succ或err
*/
header('Content-Type: text/plain');
//header('Content-Type: application/json');

$n = $_REQUEST['uname'];
$p = $_REQUEST['upwd'];

require('1_init.php');
$sql = "INSERT INTO qh_user VALUES(NULL,'$n','$p')";
$result = mysqli_query($conn,$sql);

if($result===false){
	echo 'err';
}else {
	echo 'succ';
}
