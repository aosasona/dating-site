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
<script>
    function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  </script>
</head>
<title>My Likes</title>

<body>
<a href="/account.php" class="back">&larr; My Account</a></br>
 <center>

 <div class="tab">
  <button class="tablinks" id="default" onclick="openCity(event, 'liked')">People I Liked</b></button>
  <button class="tablinks" onclick="openCity(event, 'likes')">People Who Liked Me</b></button>
</div>

<div id="liked" class="tabcontent">
<?php
    $email = $_COOKIE["email"];

    $sq = "SELECT * FROM love WHERE email='$email'";
    $run = mysqli_query($conn, $sq);
    if(mysqli_num_rows($run) < 1){
        echo "</br><small>You haven't liked any user yet.</small></br>";
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
        echo '<b><a href="/profile.php?display_name='.$ds.'" class="title">'.$like["first"].' '.$like["last"].'</a></b></div>';
    
    }
}
    }
    }
?>
</div>

<div id="likes" class="tabcontent">
<?php
if($account_status == "GOLD"){
    $sq = "SELECT * FROM love WHERE user='$display'";
    $run = mysqli_query($conn, $sq);
    if(mysqli_num_rows($run) < 1){
        echo "</br><small>No one has liked your profile yet.</small></br>";
    }
    else {
    while($liked = mysqli_fetch_array($run)){
        $ds = $liked["email"];
        $sel = "SELECT * FROM users WHERE email='$ds'";
        $run2 = mysqli_query($conn, $sel);

    while($like = mysqli_fetch_array($run2)){
        $sel2 = "SELECT * FROM profile WHERE email='$ds'";
        $run3 = mysqli_query($conn, $sel2);

    while($myliked = mysqli_fetch_array($run3)){
        echo '<img src="'.$myliked["dp"].'" class="tabcontentimg"/><div class="display-music">';
        echo '<b><a href="/profile.php?display_name='.$like["display"].'" class="title">'.$like["first"].' '.$like["last"].'</a></b></div>';
    
    }
}
    }
}
}
else {
    include $_SERVER['DOCUMENT_ROOT']."/upgrade.php";
}
?>
</div>

<script>
    document.getElementById("default").click();
</script>
