<?php
/***
*查询出所有的U盘
*/
//包含数据库连接初始化页面 
require('0_init.php');

$sql = "SELECT * FROM udisk";
$result = mysqli_query($conn, $sql);

//读取查询结果
//DQL: false / 结果集
if($result===false){
	die("查询失败！ $sql");
}
$list = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
	<style>
	.udisk {
		float: left;
		border: 1px solid #aaa;
		border-radius: 3px;
		margin: 5px;
		padding: 10px;
		position: relative;
	}
	.udisk img {
		width: 200px;
	}
	.udisk a {
		position: absolute;
		top: 5px;
		right: 5px;
		font-size: 2em;
		font-weight: bold;
		opacity: .4;
		text-decoration: none;
		color: #000;
	}
	</style>
  </head>
  <body>
    <h3>U盘列表</h3>
<!-- 	<div class="udisk"> -->
<!-- 		<img src="img/1.jpg"> -->
<!-- 		<h5>￥35.5</h5> -->
<!-- 		<p>三星32G</p> -->
<!-- 	</div> -->
<!-- 	<div class="udisk"> -->
<!-- 		<img src="img/1.jpg"> -->
<!-- 		<h5>￥35.5</h5> -->
<!-- 		<p>三星32G</p> -->
<!-- 	</div> -->
<!-- 	<div class="udisk"> -->
<!-- 		<img src="img/1.jpg"> -->
<!-- 		<h5>￥35.5</h5> -->
<!-- 		<p>三星32G</p> -->
<!-- 	</div> -->
	<?php
	foreach($list as $d){
	  echo "<div class='udisk'>";
	  echo "	<a href='$d[uid]'>&times;</a>";
	  echo "	<img src='$d[pic]'>";
	  echo "	<h5>￥$d[price]</h5>";
	  echo "	<p>$d[uname]</p>";
	  echo "</div>";
	}
	?>
	<script src="js/jquery-1.11.3.js"></script>
	<script>
	//为每个×绑定事件监听——委托给父元素
	$('body').on('click', '.udisk a', function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		location.href="5_udisk_delete.php?uid="+id;
	});
	</script>
  </body>
</html>