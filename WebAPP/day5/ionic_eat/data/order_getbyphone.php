<?php
header('Content-Type:application;charset="UTF-8"');
@$phone=$_REQUEST['phone'];
$output = [];
if(empty($phone)){
    echo '[]';
    return;
}
require('init.php');
$sql="SELECT * FROM kf_dish,kf_order WHERE kf_order.phone='$phone' AND kf_order.did=kf_dish.did";
$result=mysqli_query($conn,$sql);

while(true)
{
    $row = mysqli_fetch_assoc($result);
    if(!$row)
    {
        break;
    }
    $output[] = $row;
}

echo json_encode($output);
?>