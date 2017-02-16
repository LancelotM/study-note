<?php
//接收客户端提交的数据： $_REQUEST数组
/*@ $nm = $_REQUEST['cname'];
if($nm===null){ //客户端未提交必需的数据
  die('cname required');//终止页面的执行
}*/

@$nm = $_REQUEST['cname'] or die('cname required'); 
@$pc = $_REQUEST['pic'] or die('pic required');
@$pr = $_REQUEST['price'] or die('price required');

@$os = $_REQUEST['isonsale'];//0会自动转换为false
if($os==null){
  die('isonsale required');
}

@$bt = $_REQUEST['birthday']; //允许客户端不提交birthday

//连接到MySQL服务器
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//提交SQL语句给数据库服务器执行
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "INSERT INTO car VALUES(NULL,'$nm','$pc','$pr','$os','$bt')";
$result = mysqli_query($conn, $sql);

//判断执行结果				
if($result===false){
  echo '<h1>汽车信息添加失败</h1>';
  echo "请检查SQL：$sql";
}else {
  echo '<h1>汽车信息添加成功</h1>';
  echo "该记录在数据库中的编号：" . mysqli_insert_id($conn);  //返回刚刚执行的INSERT语句产生的自增编号
}

//关闭连接 —— 可以省略
mysqli_close($conn);