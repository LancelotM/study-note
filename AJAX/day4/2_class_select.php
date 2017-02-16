<?php
/***
*向客户端输出所有的班级信息，以JSON格式: [{},{},{}]
*/
header('Content-Type: application/json');

require('1_init.php');
$sql = "SELECT * FROM qh_class";
$result = mysqli_query($conn,$sql);

$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
//PHP: 把数组编码为JSON格式的字符串
echo   json_encode( $list );

