<?php
/*创建一个二维数组，保存5个商品的信息，每个商品都有pid、pname、price、birthday，isOnsale, pic属性，把这些信息输出在一个TABLE元素中*/
$list = [
  ['pid'=>101, 'pname'=>'可口可乐', 'price'=>3.5, 'birthday'=>1234567890123, 'isOnsale'=>true, 'pic'=>'img/101.jpg'],
  ['pid'=>102, 'pname'=>'百事可乐', 'price'=>3.6, 'birthday'=>1234567890123, 'isOnsale'=>false, 'pic'=>'img/102.jpg'],
  ['pid'=>103, 'pname'=>'非常可乐', 'price'=>3.7, 'birthday'=>1234567890123, 'isOnsale'=>false, 'pic'=>'img/103.jpg']
];

$list[]=['pid'=>104, 'pname'=>'雪碧', 'price'=>3.8, 'birthday'=>1234567890123, 'isOnsale'=>true, 'pic'=>'img/104.jpg'];

$list[]=['pid'=>105, 'pname'=>'芬达', 'price'=>3.9, 'birthday'=>1234567890123, 'isOnsale'=>false, 'pic'=>'img/105.jpg'];

//var_dump($list);
/*
$p = $list[0];
echo $p['pid'];		//正确
//echo $p[pid];		//错误
//echo "编号：$p['pid']";	 //错误
echo "编号：$p[pid]";		 //正确 
*/

echo '<table width="100%" border="1">';
echo '<thead><tr><th>编号</th><th>名称</th><th>单价</th><th>生产日期</th><th>是否特价</th><th>图片</th></tr></thead>';
echo '<tbody>';
for($i=0; $i<count($list); $i++){
	$p = $list[$i];  //依次遍历每个商品
	echo '<tr>';
	echo "  <td>$p[pid]</td>";
	echo "  <td>$p[pname]</td>";
	echo "  <td>$p[price]</td>";
	echo "  <td>$p[birthday]</td>";
	echo "  <td>$p[isOnsale]</td>";
	echo "  <td>$p[pic]</td>";
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
