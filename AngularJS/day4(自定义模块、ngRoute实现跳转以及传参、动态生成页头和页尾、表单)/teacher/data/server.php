<?php
header("Content-Type:application/json");

$array = [];

$array[] = [
'count'=>3,
'price'=>10
];

$array[] = [
'count'=>5,
'price'=>14
];

$array[] = [
'count'=>3,
'price'=>16
];

echo json_encode($array);

?>