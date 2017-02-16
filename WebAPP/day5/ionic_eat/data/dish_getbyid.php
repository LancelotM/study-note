<?php
header('Content-Type:application;charset="UTF-8"');
@$id=$_REQUEST['id'];
$output = [];
require('init.php');
$sql="SELECT * FROM kf_dish WHERE did=$id";
$result=mysqli_query($conn,$sql);
if(empty($id)){
    echo '[]';
}else{
    $row = mysqli_fetch_assoc($result);
    $output[] = $row;
}
echo json_encode($output);