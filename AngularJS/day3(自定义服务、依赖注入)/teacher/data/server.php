<?php
header("Content-Type:application/json");

$stuArray = [];

$stuArray[] = [
'name'=>'Lucy',
'age'=>30
];

$stuArray[] = [
'name'=>'Mary',
'age'=>20
];

$stuArray[] = [
'name'=>'Lily',
'age'=>32
];

echo json_encode($stuArray)

?>