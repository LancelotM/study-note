<?php
/***
*接收客户端提交的sid，删除指定的学生，返回succ或err
*/
header('Content-Type: text/plain');

@$sid = $_REQUEST['sid'] or die('sid required');

require('1_init.php');
$sql = "DELETE FROM qh_student WHERE sid=$sid";
$result = mysqli_query($conn,$sql);

if($result===false){
	echo 'err';
}else {
	echo 'succ';
}