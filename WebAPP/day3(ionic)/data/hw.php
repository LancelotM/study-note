<?php
header('Content-Type:application/json;charset="UTF-8"');
$output=[
    {"img":"1.jpg","title":"ˮĸ","detail":"��������"},
    {"img":"2.jpg","title":"����","detail":"���ޱ�־"},
    {"img":"3.jpg","title":"�Ǳ�","detail":"Ȩ���ͲƸ�������"},
    {"img":"4.jpg","title":"���","detail":"��ѩ����ĳ�פ����"},
    {"img":"1.jpg","title":"ˮĸ","detail":"��������"},
    {"img":"2.jpg","title":"����","detail":"���ޱ�־"},
    {"img":"3.jpg","title":"�Ǳ�","detail":"Ȩ���ͲƸ�������"},
    {"img":"4.jpg","title":"���","detail":"��ѩ����ĳ�פ����"}
];
echo json_encode($output);