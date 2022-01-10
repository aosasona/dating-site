<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

$user = $_GET["display_name"];

$chk = "SELECT * FROM blocked WHERE display='$display' AND user='$user'";
$run = mysqli_query($conn, $chk);

if(mysqli_num_rows($run) < 1){
    $ins = "INSERT INTO blocked(display, user) VALUES('$display', '$user')";
    mysqli_query($conn, $ins);
    echo '<meta http-equiv="refresh" content="0, url=/profile.php?display_name='.$user.'">';
?>
<script>
alert("User blocked, they cannot contact you now. Go to your profile page to unblock user");
</script>
<?php
} else {
    echo '<meta http-equiv="refresh" content="0, url=/profile.php?display_name='.$user.'">';
?>
<script>
alert("Already blocked!");
</script>
<?php
}
?>

