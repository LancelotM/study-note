<?php
/***
*根据客户端请求分数级别，返回该级别下有哪些学生，以JSON格式
***/
header('Content-Type: application/json');

@$g = $_REQUEST['scoreGrade'] or die('{"msg":"scoreGrade required"}');

require('1_init.php');
$sql = "SELECT * FROM student WHERE scoreGrade='$g'";
$result = mysqli_query($conn,$sql);

//此处省略了$result是否为false的判断
$list = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode( $list );

