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
<title>View Report</title>

<body>
</br><center><h1>Reports</h1></center></br></br>
<center>
<?php
$_SESSION["report_id"] = $_GET["id"];
$id = $_SESSION["report_id"];

$select = "SELECT * FROM report WHERE id='$id'";
$query2 = mysqli_query($conn, $select);

while($report = mysqli_fetch_array($query2)){
    echo '<b>Reported Account</b> : <a href="/siteadmin/view_profile.php?display_name='.$report["user"].'" class="link">'.$report["user"].'</a>';
    echo "</br></br>";
    echo '<b>Reported By</b> : <a href="mailto:'.$report["email"].'" class="link">'.$report["email"].'</a>';
    echo "</br></br>";
    echo '<div class="why">'.nl2br($report["report"]);
?>
</br></br></br>
<a href=<?php echo '"'.$report["image"].'"'; ?> target="_blank" class="action">View Attached Image</a>
</div>
<?php
    echo '<a href="/siteadmin/mark.php?id='.$report["id"].'" class="link">Mark As Resolved</a>';

}
?>
</center>