<?php
session_start();
if(isset($_POST['pass'])){
    if($_POST['pass']=="admin123"){
        $_SESSION['admin']=1;
        header("Location: dashboard.php");
        exit;
    }
    $err="Wrong password";
}
?>
<h2>Mailer Admin Login</h2>
<form method="post">
<input type="password" name="pass" placeholder="Password">
<button>Login</button>
</form>
<?php if(isset($err)) echo $err; ?>
