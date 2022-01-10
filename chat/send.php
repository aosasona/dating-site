<?php
error_reporting(-1);
session_start();
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

$otheruser = $_SESSION["otheruser"];

if(isset($_POST["send"])){
    $me = "SELECT * FROM chat_list WHERE user1='$display' AND user2='$otheruser' OR (user1='$otheruser' AND user2='$display')";
    $serve = mysqli_query($conn, $me);

    if(mysqli_num_rows($serve) < 1){
        $new = "INSERT INTO chat_list(user1, user2) VALUES('$display', '$otheruser')";
        mysqli_query($conn, $new);
    }

    $content = htmlspecialchars(addslashes($_POST["message"]));
    $image = $_FILES["photo1"];

    if($content != ""){
    date_default_timezone_set("Africa/Lagos");
    $date = date('d/m/Y');
    $time = date('g:ia');
    $stat = "DELIVERED";

    $sql = "INSERT INTO chat(sender, receiver, content, status, time, date) VALUES('$display', '$otheruser', '$content', '$stat', '$time', '$date')";
    mysqli_query($conn, $sql);
    }

    if(isset($image)){
        date_default_timezone_set("Africa/Lagos");
        $date = date('d/m/Y');
        $time = date('g:ia');
        $stat = "DELIVERED";
    
        //PHOTO 1 UPLOAD

        $dir = "../images/";
        $file = $dir.basename($_FILES["photo1"]["name"]);
        $uploadfilevalue = 1;
        $filetype = pathinfo($file.PATHINFO_EXTENSION);
        $photo1 = "/images/".$_FILES["photo1"]["name"];
        $image_name = $_FILES["photo1"]["name"];

        //Upload file
    move_uploaded_file($_FILES["photo1"]["tmp_name"], $file);

if ($_FILES["photo1"]["error"] != 4) {

    $sql2 = "INSERT INTO chat(sender, receiver, content, status, time, date) VALUES('$display', '$otheruser', '$photo1', '$stat', '$time', '$date')";
    mysqli_query($conn, $sql2);

}
    }
    echo '<meta http-equiv="refresh" content="0, url=/chat?display_name='.$otheruser.'#new">';
}
?>