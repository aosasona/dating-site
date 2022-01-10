<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
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
<title>Profile - @<?php echo $_GET["display_name"];?> </title>

<body>
    <center><img src="/images/banner.png" class="headimg"/></center></br>
 <a href="/index.php" class="back">&larr; Home</a></br>
 <center>
<?php
$user = $_GET["display_name"];
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";
$sql2 = "SELECT * FROM users WHERE display='$user'";
$res2 = mysqli_query($conn, $sql2);

while($prof = mysqli_fetch_array($res2)){

    $usermail = $prof["email"];

    $sql3 = "SELECT * FROM profile WHERE email='$usermail' LIMIT 1";
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

<div class="profile-page">
<h3><?php echo nl2br($match["about"]); ?></h3>
</div>

<div class="aboutmore">
<b><?php echo ucfirst($match["gender"]).', '.$match["age"]; ?></b> years old</br>
Relationship status : <b><?php echo lcfirst($match["status"]); ?></b></br>
Lives in <b><?php echo ucfirst($prof["location"]); ?></b></br>
Why am I here? <b><?php echo ucfirst($match["purpose"]); ?></b></br>
Religion : <b><?php echo ucfirst($match["religion"]); ?></b></br>
Occupation : <b><?php echo ucfirst($match["occupation"]); ?></b></br>

<?php if($account_status == "GOLD"){ ?>
Genotype : <b><?php echo strtoupper($match["genotype"]); ?></b></br>
Highest educational qualification : <b><?php echo ucfirst($match["education"]); ?></b></br>
Number of children : <b><?php echo $match["children"]; ?></b></br>
Height : <b><?php echo ucfirst($match["height"]); ?></b></br>
Body type : <b><?php echo ucfirst($match["body_type"]); ?></b></br>
Phone number : <b><a href=<?php echo '"https://wa.me/'.$prof["phone"].'"'; ?> class="whatsapp-profile"><?php echo $prof["phone"];?> <i>(Tap to chat on WhatsApp)</i></a></b></br>
<?php } else {?>
</br><h3 class="upgrade">&#128274; Upgrade to see this user's extended profile (genotype, number of children, height, phone number etc)</h3>
<?php } ?>
</div>

<?php 
if($account_status == "FREE"){
?>
<script type="text/javascript">
	atOptions = {
		'key' : '9bc40c8f58f70b8c85eadb7b09238faf',
		'format' : 'iframe',
		'height' : 250,
		'width' : 300,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.displaynetworkcontent.com/9bc40c8f58f70b8c85eadb7b09238faf/invoke.js"></scr' + 'ipt>');
</script>
<?php
}
?>

<div class="profilebtn">
<a href=<?php echo '"/chat?display_name='.$prof["display"].'#new"'; ?> class="message">Message</a>
<a href=<?php echo '"/report.php?display_name='.$prof["display"].'"'; ?> class="report">Report User</a>
<a href=<?php echo '"/block.php?display_name='.$prof["display"].'"'; ?> class="blockuser">Block User</a>
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