<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/validate.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/age.php";


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 

<style>
    body {
        margin-top : 0.2%;
    }
</style>

</head>
<title>Perfectmate Dating Site - Sort By Age</title>

<body>
<center>

<img src="/images/favicon.png" class="headlogo"/>
<?php
if($account_status == "PREMIUM" OR $account_status == "GOLD"){
?>
<div class="slideshow-container">
<b>Showing Users That Are Aged <?php echo ucfirst($age); ?> ONLY</b> (<a href="/refine_search.php" class="normal">Show by location instead</a>)</br></br>
<?php
if($gender == "Male"){
    $sex = "Female";
}
else {
    $sex = "Male";
}

$fetch = "SELECT * FROM profile WHERE gender='$sex' AND age='$age' ORDER BY rand()";

$query = mysqli_query($conn, $fetch);

while($match = mysqli_fetch_array($query)){
    $matchmail = $match["email"];
    $use = "SELECT * FROM users WHERE email='$matchmail' AND location='$location' ";
    $res = mysqli_query($conn, $use);

    $used = "SELECT * FROM users WHERE location='$location' ";
    $state = mysqli_query($conn, $used);

    if(mysqli_num_rows($state) < 1){
        echo "</br></br>There are no users in your area yet.</br>";
    } else {
    while($acc = mysqli_fetch_array($res)){
?>


<div class="mymatch fade">
<a href=<?php echo '"/profile.php?display_name='.$acc["display"].'"'; ?>><img src=<?php echo '"'.$match["dp"].'"'; ?> class="profile"></a>
    </br>

<div class="aboutuser">
<div class="name"><?php echo ucfirst($acc["first"]).' '.strtoupper(substr($acc["last"], 0, 1)).'.'; ?></div>
<div class="aboutme"><?php echo $match["age"].', '.ucfirst($acc["location"]); ?></div>
<div class="bio"><i><?php echo nl2br(ucfirst($match["bio"])); ?></i></div>
    </div>
    
    <div class="nav">
<a class="previous" onclick="plusSlides(-1)"><img src="/images/cancel.png" class="navbutton"/></a>
<a href=<?php echo '"/love.php?display_name='.$acc["display"].'"'; ?>><img src="/images/heart.png" class="navbutton"/></a>
<a class="next" onclick="plusSlides(1)"><img src="/images/next.png" class="navbutton"/></a>
</div>

 </div>

<?php
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
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mymatch");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].classList.add("active");
}
</script>

<?php
include $_SERVER['DOCUMENT_ROOT']."/bottom_nav.php";
?>
</body>
</br></br></br>
</html>
