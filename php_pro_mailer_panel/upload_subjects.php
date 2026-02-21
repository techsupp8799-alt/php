<?php
move_uploaded_file($_FILES['file']['tmp_name'],"subjects.txt");
header("Location: dashboard.php");
