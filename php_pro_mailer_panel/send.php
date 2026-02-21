<?php
require "smtp.php";
$conf=json_decode(file_get_contents("settings.json"),true);
$contacts=file("contacts.txt",FILE_IGNORE_NEW_LINES);
$subjects=file("subjects.txt",FILE_IGNORE_NEW_LINES);
$body=file_get_contents("body.html");

foreach($contacts as $m){
if(file_exists("pause.flag")){ echo "PAUSED"; exit; }
$s=$subjects[array_rand($subjects)];
$r=smtp_send($m,$s,$body,$conf);
file_put_contents("logs.txt",date("c")." ".($r?"SENT ":"FAIL ").$m."\n",FILE_APPEND);
echo "Sending $m<br>";
sleep(1);
}
echo "DONE";
