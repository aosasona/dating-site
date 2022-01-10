<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";


if(isset($_POST["yes"])){

$email = $_SESSION["deleteuser"];

$sql = "DELETE FROM users WHERE email='$email'";
mysqli_query($conn, $sql);

$sql2 = "DELETE FROM profile WHERE email='$email'";
mysqli_query($conn, $sql2);

echo '<meta http-equiv="refresh" content="0, url=/siteadmin/accounts.php">';
}
if(isset($_POST["no"])){
    echo '<meta http-equiv="refresh" content="0, url=/siteadmin/accounts.php">';
}

?>