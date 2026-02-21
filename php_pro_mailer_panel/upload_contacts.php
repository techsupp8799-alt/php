<?php
move_uploaded_file($_FILES['file']['tmp_name'],"contacts.txt");
header("Location: dashboard.php");
