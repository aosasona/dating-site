<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
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
    }
</style>


</head>
<title>Are You Sure ?</title>

<body>
<center>
<form action="/delete_account.php" method="POST">
</br></br></br></br>

<b>Are you sure you want to delete your account? This cannot be reversed and will delete ALL your data!</b> </br></br></br></br>

<input type="submit" name="yes" class="button-yes" value="Yes"/></br></br>
<input type="submit" name="no" class="button-no" value="No"/></br>
</form>
</center>
</br></br></br></br>
</body>
</html>
