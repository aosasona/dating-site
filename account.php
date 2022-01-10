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
<title>My Account</title>

<body>
 <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Options</button>
  <div id="myDropdown" class="dropdown-content">
  <a href="/index.php" class="normal2">&larr; Home</a>
  <a href="/edit.php" class="normal2">Edit Profile &#128394;</a>
<a href="/likes.php" class="normal2">My Likes &#10084;</a>
<a href="/view_block.php" class="normal2">Blocked Users &#128683;</a>
<a href="/forgot-password" class="normal2">Change Password</a>
<?php if($account_status != "GOLD"){?>
<a href="/upgrade.php" class="normal2">Upgrade Account</a>
<?php } ?>
<a href="/delete.php" class="normal">Delete Account</a>
<a href="/logout" class="normal">Sign Out &rarr;</a>
  </div>
</div></br>
 <center>

<div class="photos">
<a href=<?php echo '"'.$dp.'"'; ?> target="_blank"><img src=<?php echo '"'.$dp.'"'; ?> class="profile-pic"></a>
<a href=<?php echo '"'.$photo1.'"'; ?> target="_blank"><img src=<?php echo '"'.$photo1.'"'; ?> class="profile-pic"></a>
<a href=<?php echo '"'.$photo2.'"'; ?> target="_blank"><img src=<?php echo '"'.$photo2.'"'; ?> class="profile-pic"></a>
</div>

<div class="matchname">
<?php echo ucfirst($first).' '.ucfirst($last); ?>
<h4>@<?php echo strtolower($display); ?></h4>
    </div>

<div class="profile-page">
<h3><?php echo nl2br($about); ?></h3>
</div>

<div class="aboutmore">
Account Type : <b><?php echo ucfirst($account_status); ?></b></br>
<b><?php echo ucfirst($gender).', '.$age; ?></b> years old</br>
Relationship status : <b><?php echo lcfirst($status); ?></b></br>
Lives in <b><?php echo ucfirst($location); ?></b></br>
Why am I here? <b><?php echo ucfirst($purpose); ?></b></br>
Genotype : <b><?php echo strtoupper($genotype); ?></b></br>
Occupation : <b><?php echo ucfirst($occupation); ?></b></br>
Highest educational qualification : <b><?php echo ucfirst($education); ?></b></br>
Religion : <b><?php echo ucfirst($religion); ?></b></br>
Number of children : <b><?php echo $children; ?></b></br>
Height : <b><?php echo ucfirst($height); ?></b></br>
Body type : <b><?php echo ucfirst($body); ?></b></br>
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
</br></br>
</body>
<?php 
include $_SERVER['DOCUMENT_ROOT']."/bottom_nav.php";
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
</br>
</html>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>