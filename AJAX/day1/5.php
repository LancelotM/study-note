<?php
//设置响应消息头部
header('Content-Type: text/plain');  


for($i=0; $i<5000; $i++){
	echo $i.'-hello ';
}


