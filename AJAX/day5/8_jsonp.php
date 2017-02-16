<?php
header('Content-Type: application/javascript');

$cb = $_REQUEST['callback'];

sleep(5);


$str = '{"ename":"Mary", "age":30}';

echo $cb.'( ' .$str . ')';
