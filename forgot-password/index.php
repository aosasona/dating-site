<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 

<style>
body {
    margin-top : 0.3%;
    background : 
}
</style>

</head>
<title>Forgot Password</title>
<center>
<h1>Forgot Password</h1></br>
<form action="/forgot-password/index.php" method="POST">
<div class="field">
    <input type="text" name="email" placeholder="eMail Address"/>
</div>

<div class="field">
    <input type="text" name="phone" placeholder="+2347060003000"/>
</div>

<div class="field">
    <input type="password" name="pass1" placeholder="Password" minlength="6"/>
</div>

<div class="field">
    <input type="password" name="pass2" placeholder="Confirm password" minlength="6"/>
</div>
</br>
<input type="submit" name="reset" class="button-home" value="Reset Password"/>
</form>
</center>
</body>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
</html>

<?php 
if(isset($_POST["reset"])){
$mail = $_POST["email"];
$number = "+234".substr($_POST["phone"], -10);
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];

$sel = "SELECT * FROM users WHERE email='$mail' AND phone='$number'";
$res = mysqli_query($conn, $sel);

if(mysqli_num_rows($res) > 0){
    if($pass1 == $pass2){
        $pass = md5($pass1);

        $up = "UPDATE users SET password='$pass' WHERE email='$mail'";
        mysqli_query($conn, $up);
        echo '<meta http-equiv="refresh" content="0, url=/signin">';
    } else {
    echo '<meta http-equiv="refresh" content="0, url=/forgot-password">';
   ?>
<script>
alert("Passwords do not match!");
</script>
<?php
}
} else {
    echo '<meta http-equiv="refresh" content="0, url=/forgot-password">';
   ?>
<script>
alert("Account not found!");
</script>
<?php
}
}
?>