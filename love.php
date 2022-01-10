<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

$user = $_GET["display_name"];

$chk = "SELECT * FROM love WHERE email='$email' AND user='$user'";
$run = mysqli_query($conn, $chk);

if(mysqli_num_rows($run) < 1){
    $ins = "INSERT INTO love(email, user) VALUES('$email', '$user')";
    mysqli_query($conn, $ins);
    echo '<meta http-equiv="refresh" content="0, url=/index.php">';
} else {
    echo '<meta http-equiv="refresh" content="0, url=/index.php">';
}
?>

