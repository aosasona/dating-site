<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/admin_validate.php";
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
        color : white;
    }
</style>
</head>
<title>Admin Control Panel</title>

<body>
<center></br>
    <h1>Control Panel</h1>
</br></br>
<div class="tool"><a href="/siteadmin/report.php" class="adminlinks">Manage Reports</a></div></br>
<div class="tool"><a href="/siteadmin/accounts.php" class="adminlinks">Manage Accounts</a></div></br>
</center>