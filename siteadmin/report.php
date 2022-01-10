<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/admin_validate.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 

<style>
    body {
        margin-top : 0.5%;
        background : black;
        color : white;
    }
</style>


</head>
<title>Reports</title>

<body>
</br><center><h1>Reports</h1></center></br></br>

<?php
$select = "SELECT * FROM report WHERE resolved='NO' ORDER BY id DESC";
$query2 = mysqli_query($conn, $select);

echo '<div class="scroll"><table style="width:100%;">';
echo '<tr><th>Ticket ID</th><th>Issued By</th><th>Action</th></tr>';

while($report = mysqli_fetch_array($query2)){
    echo '<tr><td class="title">Ticket #'.$report["id"].'</td>';
    echo '<td>'.$report["email"].'</td>';
    echo '<td><a href="/siteadmin/view_report.php?id='.$report["id"].'" class="action">View Report</a></td></tr>';
}
echo "</table>";
?>