<?php
header('Content-Type:text/plain;charset=UTF-8');
@$ph=$_REQUEST['phone'] or die('phone required');
@$pw=$_REQUEST['pwd'] or die('pwd required');
require("init.php");
$sql="SELECT * FROM mail WHERE phone='$ph' AND pwd='$pw'";
$result=mysqli_query($conn,$sql);
if($result===false){
	echo "SQL语句有错误:$sql";
}else{
	$row=mysqli_fetch_row($result);
	if($row===null){
		echo "err";
	}else{
		echo "succ";
	}
}