<?php
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";

$id = $_GET["id"];

$update = "UPDATE report SET resolved='YES' WHERE id='$id'";
mysqli_query($conn, $update);

echo '<meta http-equiv="refresh" content="0, url=/siteadmin/report.php">';
?>
<script>
alert("Ticket Resolved!!");
</script>