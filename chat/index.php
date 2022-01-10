<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

if($account_status != "FREE"){
    $otheruser = $_GET["display_name"];
    $_SESSION["otheruser"] = $otheruser;

    $re = "UPDATE chat SET status='READ' WHERE sender='$otheruser' AND receiver='$display'";
    mysqli_query($conn, $re);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 

<style>

    body {
        margin-top : 0.3%;
    }
</style>


</head>
<title>Chat</title>
<?php
$que = "SELECT * FROM users WHERE display='$otheruser'";
$run = mysqli_query($conn, $que);

while($pick = mysqli_fetch_array($run)){
    $mail = $pick["email"];

    $pr = "SELECT * FROM profile WHERE email='$mail'";
    $quer = mysqli_query($conn, $pr);

    while($data = mysqli_fetch_array($quer)){
?>
<div class="headchat">
<a href="/chat/messages.php" class="backc">&#8701;</a><a href=<?php echo '"/profile.php?display_name='.$otheruser.'"'; ?> class="chatname">
<img src=<?php echo '"'.$data["dp"].'"'; ?> class="profile-picture"/>
<?php echo ucfirst($pick["first"]).' '.ucfirst($pick["last"]); ?></a>
</div>
<?php
    }
?>
<center>
<div class="conversation">
<?php

$my = "SELECT * FROM chat WHERE (sender='$display' AND receiver='$otheruser') OR (sender='$otheruser' AND receiver='$display') ORDER BY id ASC";
$req = mysqli_query($conn, $my);

while($convo = mysqli_fetch_array($req)){
    $time = $convo["time"];
    $date = $convo["date"];
    $delivery = $convo["status"];

    if(strtolower($convo["sender"]) == strtolower($display)){
        $div = "right";
        $timestamp = "right-time";
        $content = $convo["content"];
        $credit = '<div class="timestamp">'.$convo["status"].'</div>';

        if(substr($convo["content"], 0, 7) == "/images"){
            $div = "right";
            $timestamp = "right-time";
            $content = '<a href="'.$convo["content"].'"class="chatimage">Tap to see image...</a>';
            
        }
    }
    if(strtolower($convo["sender"]) == strtolower($otheruser)){
        $div = "left";
        $timestamp = "left-time";
        $content = $convo["content"];
        $credit = "";

        if(substr($convo["content"], 0, 7) == "/images"){
            $div = "left";
            $timestamp = "left-time";
            $content = '<a href="'.$convo["content"].'"class="chatimage" target="_blank">Tap to see file...</a>';
        }
    }
    
  echo '<div class="'.$div.'">'.nl2br($content).$credit.'</div></br>';
  echo '</br></br>';

    }
}
?>

</div>
<div class="new" id="new"></div>
</br></br>
<div class="fixed">
<?php 
$blk = "SELECT * FROM blocked WHERE display='$display' AND user='$otheruser' OR (display='$otheruser' AND user='$display')";
$bloc = mysqli_query($conn, $blk);
if(mysqli_num_rows($bloc) < 1){
?>
<form action="/chat/send.php" method="post" enctype="multipart/form-data">
<textarea name="message" rows="3" placeholder="Type your message here..."></textarea></br>
<label class="file-upload"><input type="file" name="photo1" id="profile"/><img src="/images/attach.png" class="attach"/></label>
<input type="submit" name="send" class="send" value="Send"/>
</form>
</div>

<?php
}
else {
    echo "<center><small><b>You can't reply to this conversation</b></small></center>";
}
}
else {
    include $_SERVER['DOCUMENT_ROOT']."/upgrade.php";
}
?>