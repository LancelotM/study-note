<?php
/**
*接收客户端提交的uid，实现记录删除
*/

@$id = $_REQUEST['uid'] or die('uid required');

require('0_init.php');

$sql = "DELETE FROM udisk WHERE uid='$id'";
$result = mysqli_query($conn,$sql);

if($result===false){
	echo "<h3>删除失败！</h3>";
	echo "请检查SQL： $sql";
}else {
	echo "<h3>删除成功！</h3>";
	echo "删除操作影响的行数：".mysqli_affected_rows($conn);
}


echo "<hr>";
echo "<a href='4_udisk_select.php'>查看所有U盘</a>";