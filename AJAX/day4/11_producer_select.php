<?php
/***
*根据客户端提交的typeId，返回所有的产品厂家，以JSON格式
*/
header('Content-Type: application/json');

$typeId = $_REQUEST['typeId'];

require('1_init.php');
$sql = "SELECT * FROM qh_producer WHERE typeId='$typeId'";
$result = mysqli_query($conn,$sql);

$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($list);
