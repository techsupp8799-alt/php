<?php
session_start();
if(!isset($_SESSION['admin'])) exit;

$data=[
"smtp_host"=>$_POST['host'],
"smtp_port"=>$_POST['port'],
"smtp_user"=>$_POST['user'],
"smtp_pass"=>$_POST['pass'],
"from_email"=>$_POST['from'],
"from_name"=>$_POST['name']
];

file_put_contents("settings.json",json_encode($data));
header("Location: dashboard.php");
