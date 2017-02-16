<?php
/***
*根据客户端提交的汽车编号，查询出该汽车所有的信息，显示在表单中
*/
@$id = $_REQUEST['cid'] or die('cid required');

//连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//执行SQL
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);
$sql = "SELECT * FROM car WHERE cid='$id'";
$result = mysqli_query($conn,$sql);

//处理结果集，抓取一行记录，一个汽车的信息
//DQL:  false 或  结果集描述对象
if($result===false){
	die("SQL语句执行失败：$sql");
}else {	//执行成功
	$c = mysqli_fetch_assoc($result);
	//var_dump($c);
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>修改汽车信息</h1>
    <form action="8_car_update.php">
	<!--隐藏字段：要修改的汽车编号 -->
	<input type="hidden" name="cid" value="<?php echo $c['cid']?>">

    汽车名称：<input name="cname" value="<?php echo $c['cname']?>"><br>
    汽车图片：<input name="pic" value="<?php echo $c['pic']?>"><br>
    汽车价格：<input name="price" value="<?php echo $c['price']?>"><br>
    是否特价：
	<input name="isonsale" type="radio" value="1" <?php echo $c['isonsale']==='1'?'checked':'' ?>> 是  
	<input name="isonsale" type="radio" value="0" <?php echo $c['isonsale']==='0'?'checked':'' ?>> 否
	<br>
    生产日期：<input name="birthday" value="<?php echo $c['birthday']?>"><br>

    <input type="submit">
    </form>
  </body>
</html>