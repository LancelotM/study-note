<?php
header("Content-Type:application/json");
@$name=$_REQUEST['name'];
$output=[];
$output[]=$name;
echo json_encode($name);