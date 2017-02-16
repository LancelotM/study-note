<?php
/**
*向客户端返回所有的产品类别，以JSON格式
*/
header('Content-Type: application/json');

require('1_init.php');
$sql = "SELECT * FROM qh_type";
$result = mysqli_query($conn,$sql);


$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($list);

