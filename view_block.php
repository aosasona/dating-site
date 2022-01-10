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
<title>Blocked Users</title>

<body>
<a href="/account.php" class="back">&larr; My Account</a></br></br>
<center><h4>Tap to unblock user(s)</h4></center></br>
 <center>
<?php

    $sq = "SELECT * FROM blocked WHERE display='$display'";
    $run = mysqli_query($conn, $sq);
    if(mysqli_num_rows($run) < 1){
        echo "</br><small>You haven't blocked any user yet.</small></br>";
    }
    else {
    while($liked = mysqli_fetch_array($run)){
        $ds = $liked["user"];
        $sel = "SELECT * FROM users WHERE display='$ds'";
        $run2 = mysqli_query($conn, $sel);

    while($like = mysqli_fetch_array($run2)){
        $umail = $like["email"];
        $sel2 = "SELECT * FROM profile WHERE email='$umail'";
        $run3 = mysqli_query($conn, $sel2);

    while($myliked = mysqli_fetch_array($run3)){
        echo '<img src="'.$myliked["dp"].'" class="tabcontentimg"/><div class="display-music">';
        echo '<b><a href="/unblock.php?display_name='.$ds.'" class="title">'.$like["first"].' '.$like["last"].'</a></b></div>';
    
    }
}
    }
    }
?>
