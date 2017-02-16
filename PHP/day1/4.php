<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>我的第一个<br>PHP网页</h1>
	<?php      //PHP解释器只会处理此标记中的内容
	$msg = 'Hello World';   //PHP变量名必须以$开头
	for($i=0; $i<10; $i++){
		//echo($msg);   //PHP语句分号不能省略
		//echo($i+$msg);	//+只做数学运算
		//echo($i);
		//echo($msg);
		echo($i . $msg);	//.是字符串拼接
		//<br>;
		echo('<br>');
	}
	?>
  </body>
</html>