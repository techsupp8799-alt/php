<?php
function smtp_send($to,$sub,$body,$conf){
$h=$conf['smtp_host'];$p=$conf['smtp_port'];
$u=$conf['smtp_user'];$pw=$conf['smtp_pass'];
$f=$conf['from_email'];$fn=$conf['from_name'];

$s=stream_socket_client("tcp://$h:$p",$e,$es,30);
if(!$s) return false;

function r($s){return fgets($s,512);}
function c($s,$x){fwrite($s,$x."\r\n");return r($s);}

r($s);c($s,"EHLO localhost");c($s,"STARTTLS");
stream_socket_enable_crypto($s,true,STREAM_CRYPTO_METHOD_TLS_CLIENT);
c($s,"EHLO localhost");
c($s,"AUTH LOGIN");c($s,base64_encode($u));c($s,base64_encode($pw));
c($s,"MAIL FROM:<$f>");c($s,"RCPT TO:<$to>");c($s,"DATA");

$msg="From:$fn <$f>\r\nContent-Type:text/html\r\nSubject:$sub\r\n\r\n$body\r\n.";
c($s,$msg);c($s,"QUIT");fclose($s);
return true;
}
