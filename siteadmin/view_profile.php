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
        margin-top : 0.3%;
        background : black;
        color : white;
    }
</style>

</head>
<title>Profile - @<?php echo $_GET["display_name"];?> </title>

<body>
    <center><img src="/images/favicon.png" class="headlogo"/></center></br>
 <a href="/siteadmin/main.php" class="back">&larr; cPanel Home</a></br>
 <center>
<?php
$user = $_GET["display_name"];
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";
$sql2 = "SELECT * FROM users WHERE display='$user'";
$res2 = mysqli_query($conn, $sql2);

while($prof = mysqli_fetch_array($res2)){

    $usermail = $prof["email"];

    $sql3 = "SELECT * FROM profile WHERE email='$usermail'";
    $res3 = mysqli_query($conn, $sql3);
    
    while($match = mysqli_fetch_array($res3)){  
?>



<div class="photos">
<a href=<?php echo '"'.$match["dp"].'"'; ?> target="_blank"><img src=<?php echo '"'.$match["dp"].'"'; ?> class="profile-pic"></a>
<a href=<?php echo '"'.$match["photo1"].'"'; ?> target="_blank"><img src=<?php echo '"'.$match["photo1"].'"'; ?> class="profile-pic"></a>
<a href=<?php echo '"'.$match["photo2"].'"'; ?> target="_blank"><img src=<?php echo '"'.$match["photo2"].'"'; ?> class="profile-pic"></a>
</div>

<div class="matchname">
<?php echo ucfirst($prof["first"]).' '.ucfirst($prof["last"]); ?>
<h4>@<?php echo strtolower($prof["display"]); ?></h4>
    </div>

<div class="profile-page2">
<h3><?php echo nl2br($match["about"]); ?></h3>
</div>

<div class="aboutmore">
<b><?php echo ucfirst($match["gender"]).', '.$match["age"]; ?></b> years old</br>
Relationship status : <b><?php echo lcfirst($match["status"]); ?></b></br>
Lives in <b><?php echo ucfirst($prof["location"]); ?></b></br>
Why am I here? <b><?php echo ucfirst($match["purpose"]); ?></b></br>
Religion : <b><?php echo ucfirst($match["religion"]); ?></b></br>
Occupation : <b><?php echo ucfirst($match["occupation"]); ?></b></br>
Genotype : <b><?php echo strtoupper($match["genotype"]); ?></b></br>
Highest educational qualification : <b><?php echo ucfirst($match["education"]); ?></b></br>
Number of children : <b><?php echo $match["children"]; ?></b></br>
Height : <b><?php echo ucfirst($match["height"]); ?></b></br>
Body type : <b><?php echo ucfirst($match["body_type"]); ?></b></br>
Phone number : <b><?php echo $prof["phone"]; ?></b></br>

</div>

<div class="profilebtn">
<a href=<?php echo '"/siteadmin/delete_user.php?mail='.$prof["email"].'"'; ?> class="blockuser">DELETE ACCOUNT</a>
    </div>

<?php
    }
}
?>
</br></br>
</body>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
</html>