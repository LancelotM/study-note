<?php
header('Content-Type:application/json;charset="UTF-8"');
$output=[
    {"img":"1.jpg","title":"水母","detail":"软体生物"},
    {"img":"2.jpg","title":"考拉","detail":"澳洲标志"},
    {"img":"3.jpg","title":"城堡","detail":"权利和财富的象征"},
    {"img":"4.jpg","title":"企鹅","detail":"冰雪世界的常驻居民"},
    {"img":"1.jpg","title":"水母","detail":"软体生物"},
    {"img":"2.jpg","title":"考拉","detail":"澳洲标志"},
    {"img":"3.jpg","title":"城堡","detail":"权利和财富的象征"},
    {"img":"4.jpg","title":"企鹅","detail":"冰雪世界的常驻居民"}
];
echo json_encode($output);