<?php
/***
*接收客户端提交的cid，返回指定班级中的学生数据，以JSON格式：  [{},{},{}]
*/
header('Content-Type: application/json');

@$cid = $_REQUEST['cid'] or die('{"msg":"cid required"}');

require('1_init.php');
$sql = "SELECT * FROM qh_student WHERE classId='$cid'";
$result = mysqli_query($conn,$sql);

$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
//把PHP数组编码为JSON格式的字符串
echo  json_encode($list);
