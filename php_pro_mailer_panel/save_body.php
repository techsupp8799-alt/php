<?php
file_put_contents("body.html",$_POST['body']);
header("Location: dashboard.php");
