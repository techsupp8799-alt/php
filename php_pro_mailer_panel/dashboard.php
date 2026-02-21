<?php
session_start();
if(!isset($_SESSION['admin'])) header("Location: login.php");
$settings=json_decode(file_get_contents("settings.json"),true);
?>
<h2>PRO MAILER PANEL</h2>

<h3>SMTP Settings</h3>
<form method="post" action="save_smtp.php">
Host <input name="host" value="<?=$settings['smtp_host']?>"><br>
Port <input name="port" value="<?=$settings['smtp_port']?>"><br>
Username <input name="user" value="<?=$settings['smtp_user']?>"><br>
Password <input name="pass" value="<?=$settings['smtp_pass']?>"><br>
From Email <input name="from" value="<?=$settings['from_email']?>"><br>
From Name <input name="name" value="<?=$settings['from_name']?>"><br>
<button>Save SMTP</button>
</form>

<hr>

<h3>Upload Contacts</h3>
<form method="post" enctype="multipart/form-data" action="upload_contacts.php">
<input type="file" name="file">
<button>Upload</button>
</form>

<h3>Upload Subjects</h3>
<form method="post" enctype="multipart/form-data" action="upload_subjects.php">
<input type="file" name="file">
<button>Upload</button>
</form>

<h3>Email HTML</h3>
<form method="post" action="save_body.php">
<textarea name="body" rows="10" cols="70"><?php if(file_exists("body.html")) echo htmlspecialchars(file_get_contents("body.html")); ?></textarea><br>
<button>Save Body</button>
</form>

<h3>Attachment</h3>
<form method="post" enctype="multipart/form-data" action="upload_attach.php">
<input type="file" name="file">
<button>Upload</button>
</form>

<hr>

<a href="send.php">START SENDING</a><br>
<a href="pause.php">PAUSE</a><br>
<a href="resume.php">RESUME</a><br>

<hr>
<a href="logs.txt" target="_blank">VIEW LOGS</a>
