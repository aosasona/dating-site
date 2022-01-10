<?php
session_start();
error_reporting(0);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";

$useracc = $_GET["display_name"];
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
<title>Report Account</title>

<body>
    <center>
    <center><img src="/images/banner.png" class="headimg"/></center></br>
        <h1>Report Account</h1></br>
<form action="/report.php" method="POST" enctype="multipart/form-data">
<div class="field">
<input name="useracc" value=<?php echo '"'.$useracc.'"'; ?> readonly/>
</div>

</br>
<textarea name="report" class="about" placeholder="Tell us what happened... Max. 1500 characters" maxlength="1500" minlength="25" required="required"></textarea>
</br></br>

<div class="select">
<div class="desc"><font color="black">Attach a screenshot</font></div>
<input type="file" name="photo1" id="photo1" required="required"/></br>
</div></br>

</br></br>
<input type="submit" name="submit" class="button-home" value="Report Account &rarr;"/>
</form>

</center>
</br>
</div>
</body>
</html>

<?php

if(isset($_POST["submit"])){
    $useraccount = $_POST["useracc"];
    $report = htmlspecialchars(addslashes($_POST["report"]));

    //PHOTO 1 UPLOAD

$dir = $_SERVER['DOCUMENT_ROOT']."/images/";
$file = $dir.basename($_FILES["photo1"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$photo1 = "/images/".$_FILES["photo1"]["name"];
$image_name = $_FILES["photo1"]["name"];

//Upload file
move_uploaded_file($_FILES["photo1"]["tmp_name"], $file);

$sq = "INSERT INTO report(email, user, report, image, resolved) VALUES('$email', '$useraccount', '$report', '$photo1', 'NO')";
mysqli_query($conn, $sq);

echo '<meta http-equiv="refresh" content="0, url=/profile.php?display_name='.$useraccount.'">';
?>
<script>
alert("Report submitted!!");
</script>
<?php
}
?>
