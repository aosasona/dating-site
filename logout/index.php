<?php
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";

setcookie("email", "", time() - 3600, "/");

setcookie("name", "", time() - 3600, "/");

header('location: https://perfectmatedating.com.ng/login/');
exit();
?>

