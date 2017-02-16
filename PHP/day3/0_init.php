<?php
/****
*数据库连接的初始化页面
*客户端不应该直接访问此页面，此页面应该被其它页面包含
*/
//连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', '', 'jd', 3306);

//执行SQL
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

