<?php
header('Content-Type:application/json;charset="UTF-8"');
$json=[];
$json[]=[
	'name'=>'Tom',
	'age'=>20
];
$json[]=[
	'name'=>'Alice',
	'age'=>50
];
$json[]=[
	'name'=>'Mike',
	'age'=>100
];
echo json_encode($json);