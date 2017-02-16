<?php
@$dId=$_REQUEST['deptID'];
require('init.php');
$sql="SELECT * FROM emp WHERE deptID='$dId'";
$result=mysqli_query($conn,$sql);
if($result===false){
    echo "SQL语句错误：$sql";
}else{
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    if($list===false){
        echo "not_find";
    }eles{
        echo "succ";
    }
}