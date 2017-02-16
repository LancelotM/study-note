<?php
header('Content-Type:application;charset="UTF-8"');
@$kw=$_REQUEST['kw'];
$output = [];
if(empty($kw)){
    echo '[]';
    return;
}
require('init.php');
$sql="SELECT * FROM kf_dish WHERE name LIKE '%$kw%' OR material LIKE '%$kw%'";
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