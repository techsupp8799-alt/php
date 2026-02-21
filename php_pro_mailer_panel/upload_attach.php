<?php
if(!is_dir("attach")) mkdir("attach");
move_uploaded_file($_FILES['file']['tmp_name'],"attach/".$_FILES['file']['name']);
header("Location: dashboard.php");
