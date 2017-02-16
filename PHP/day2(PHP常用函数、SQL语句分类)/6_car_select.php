<?php
/**
*在一个表格中向客户端输出所有的汽车信息
*/
//连接数据库
$conn = mysqli_connect('127.0.0.1', 'root', '', 'huimaiche', 3306);

//提交SQL语句
$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

$sql = "SELECT * FROM car";
$result = mysqli_query($conn,$sql);

if($result===false){
	echo "<h1>查询失败！</h1>";
	echo "请检查SQL语句：$sql";
	die();
}else {		//查询成功
	//抓取所有的记录行 —— 二维数组
	$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
<table width='100%' border='1'>
<thead>
	<tr>
		<th>编号</th>
		<th>图片</th>
		<th>名称</th>
		<th>价格</th>
		<th>特价</th>
		<th>生日</th>
		<th>操作</th>
	</tr>
</thead>
<tbody>
  <?php
  foreach($list as $c){
	  echo "<tr>";
	  echo "  <td>$c[cid]</td>";
	  echo "  <td><img src='$c[pic]' style='width:80px'></td>";
	  echo "  <td>$c[cname]</td>";
	  echo "  <td>￥$c[price]</td>";
	  echo "  <td>$c[isonsale]</td>";
	  echo "  <td>$c[birthday]</td>";
	  echo "  <td>";
	  echo "	<a href='$c[cid]'>删除</a>";
	  echo "	<a href='$c[cid]'>修改</a>";
	  echo "  </td>";
	  echo "</tr>";
  }
  ?>
</tbody>
</table>
<script src="js/jquery-1.11.3.js"></script>
<script>
//处理是否特价
$('tbody tr td:nth-child(5)').each(function(i,td){
	//console.log(i);
	//console.log(td);
	var h = td.innerHTML;
	h =  (h=='1')?'是':'否';
	td.innerHTML = h;
});

//给所有的Date对象添加一个方法
Date.prototype.toCNString = function(){
	return this.getFullYear()+'-'+(this.getMonth()+1)+'-'+this.getDate();
}

//处理出厂日期			
$('tbody tr td:nth-child(6)').each(function(i,td){
	var h = td.innerHTML;
	h = parseInt(h);
	h = new Date(h);
	td.innerHTML = h.toCNString();
});

//为每个删除超链接添加事件监听		
//多个完全相似的“删除”超链接——委托给父元素
$('table').on('click', 'a:contains("删除")', function(e){
	e.preventDefault(); //防止超链接跳转
	var carId = $(this).attr('href');
	//console.log(carId);
	//使用JS跳转到“汽车删除”页面，并传递cid
	location.href = "3_car_delete.php?cid="+carId;
});

//为每个修改超链接添加事件监听		
//多个完全相似的“修改”超链接——事件委托给父元素
$('table').on('click', 'a:contains("修改")', function(e){
	e.preventDefault(); //防止超链接跳转
	var carId = $(this).attr('href');
	//console.log(carId);
	//使用JS跳转到“汽车修改查询”页面，并传递cid
	location.href = "7_car_update_select.php?cid="+carId;
});
</script>