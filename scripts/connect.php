<?php
$host = "localhost";
$dBuser = "";
$dBpass = "";
$dBname = "";

$conn = mysqli_connect($host, $dBuser, $dBpass, $dBname);

$db = mysqli_select_db($conn, 'dating');

?>