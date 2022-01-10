<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

$user = $_GET["display_name"];

$squ = "DELETE FROM blocked WHERE display='$display' AND user='$user'";
mysqli_query($conn, $squ);

echo '<meta http-equiv="refresh" content="0, url=/view_block.php">';
?>
<script>
alert("User unblocked!!");
</script>