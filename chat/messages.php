<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

if($account_status != "FREE"){
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
<title>Conversations</title>
<center><img src="/images/banner.png" class="headimg2"/></center></br>
<?php include $_SERVER['DOCUMENT_ROOT']."/bottom_nav.php";?>
<h1>Conversations</h1></br></br>
<center>
<?php
$me = "SELECT * FROM chat_list WHERE user1='$display' OR user2='$display'";
$serve = mysqli_query($conn, $me);

if(mysqli_num_rows($serve) > 0){
while($list = mysqli_fetch_array($serve)){
    if($list["user1"] == $display){
        $currentuser = $list["user1"];
        $otheruser = $list["user2"];
    } else {
        $currentuser = $list["user2"];
        $otheruser = $list["user1"];
    }

$que = "SELECT * FROM users WHERE display='$otheruser'";
$run = mysqli_query($conn, $que);

while($pick = mysqli_fetch_array($run)){
    $mail = $pick["email"];

    $pr = "SELECT * FROM profile WHERE email='$mail'";
    $quer = mysqli_query($conn, $pr);

    while($chat = mysqli_fetch_array($quer)){
        echo '<img src="'.$chat["dp"].'" class="tabcontentimg2"/><div class="display-chat">';
        echo '<b><a href="/chat/index.php?display_name='.$otheruser.'#new" class="title">'.$pick["first"].' '.$pick["last"].'</a></b></div>';
}
}
}
}
else {
    echo "</br></br></br></br></br><b>No conversations to show</b>";
}
}
else {
    include $_SERVER['DOCUMENT_ROOT']."/upgrade.php";
}
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
</center>