<?php
/**
*向客户端输出所有的产品信息，以JSON格式：[{},{},{},....]
*/
header('Content-Type: application/json;charset=UTF-8');

require('1_init.php');
$sql = "SELECT * FROM jd_product";
$result = mysqli_query($conn,$sql);
//此处省略了$result为false的判断

$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($list);