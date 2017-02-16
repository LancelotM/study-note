<?php
$list = [10, 30, 50, 70];
////关联数组可以使用for/foreach遍历
//遍历数组中的每个值
foreach($list  as  $num){
	echo "$num <br>";
}
echo '<hr>';
//遍历数组中的每个下标和值
foreach($list as  $i=>$n){
	echo "$i - $n<br>";
}
echo "<hr>";

////关联数组只能使用foreach遍历
$emp = ['eid'=>101, 'ename'=>'Tom'];
foreach($emp as $v){
	echo "$v<br>";
}
echo "<hr>";
foreach($emp as $k=>$v){
	echo "$k - $v<br>";
}
echo "<hr>";