<?php
//接收客户端提交的数据
@$id = $_REQUEST['cid'] or die('cid required'); 

//连接到MySQL服务器
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//提交SQL语句给数据库服务器执行
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "DELETE FROM car WHERE cid='$id'";
$result = mysqli_query($conn, $sql);

//判断执行结果				
if($result===false){
  echo '<h1>汽车信息删除失败</h1>';
  echo "请检查SQL：$sql";
}else {
  echo '<h1>汽车信息删除成功</h1>';
  echo "删除操作影响的行数：" . mysqli_affected_rows($conn); //返回刚刚执行的SQL语句影响的行数
}

//关闭连接 —— 可以省略
mysqli_close($conn);


echo "<hr>";
echo "<a href='6_car_select.php'>返回汽车列表</a>";