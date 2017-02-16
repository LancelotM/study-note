<?php
//php中的字符串

$ename = '唐牧';
$phone = "13501234567";

echo '姓名：'.$ename.' 电话：'.$phone;
echo '<br>';
echo '姓名：$ename 电话：$phone';
echo '<br>';

//双引号字符串中若包含$变量，会被转换为变量值
echo "姓名：$ename 电话：$phone";
echo '<br>';
//echo "姓名：$ename电话：$phone";
//echo '<br>';

