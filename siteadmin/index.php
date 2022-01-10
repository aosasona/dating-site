<?php
error_reporting(-1);
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";

if(isset($_COOKIE["admin"])){
  echo '<meta http-equiv="refresh" content="0, url=/siteadmin/main.php">';
}
?>
<!DOCTYPE html>
<html>
<head> 
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
     body {
        margin-top : 0.3%;
        background : black;
    }
    form.login {
    width : 90%;
    height : auto;
    background : #333;
    padding : 25px;
    padding-top : 75px;
    padding-bottom : 75px;
    border : none;
    border-radius : 20px;
    margin-top : 120px;
}
</style>
</head>
<title>Admin - Sign In</title>

<body>
<center>
<div class="row">
</br>
<h1>Sign In </h1>

<form action="/siteadmin/login.php" method="POST" class="login">
<div class="field">
<input type="password" name="password" id="pass" placeholder="Password"/>
</div>

</br>
</br>

<button action="submit" name="login" class="button-home">Login</button>
</br>
<script>
//Show/Hide Password
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</form>