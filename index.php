<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";

function validate() {
  if(isset($_COOKIE["email"])){
      return true;
  }
  else {
      return false;
  }
}

if(!validate()){
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 
<meta name="author" content="Ayodeji Osasona">
<meta name="description" content="A perfect place for singles to meet for a serious relationship that leads to marriage"/>
<meta name="keywords" content="Perfectmate, matchmaking, dating, nigerian dating, perfectmate matchmaking, match, singles, dating site, website for dating, 9ja"/>
<style>
    body {
        margin-top : 0.2%;
    }
</style>

</head>
<title>Perfectmate Dating Site</title>

<body>
<center><img src="/images/banner.png" class="headimg2"/>

</br></br>
<img src="/images/dating.jpg" width="280px" height="280px" style="Object-fit : cover" alt="relationship"/></br>
</center>
PerfectMate is a serious dating site which uses intelligent matchmaking to bring like-minded singles together. Unlike many other online dating sites, our platform takes into account your relationship desires and personal traits through an extensive personality test. As a result, PerfectMate is actually able to meet expectation and hopes for online dating.
</br></br>
<h2><b>PerfectMate: Our Members and Online Dating Sites</b></h2></br></br>
While single life is fun for a while, being in love is something special. PerfectMate is a good place to start. We try to ensure that everyone on our dating site is serious about their search for love. We hold our members’ safety as paramount and have strict data protocols and fraud protection measures in place to guarantee your online dating security. Our customer care team is also dedicated to taking care of your needs and answering any queries you have during the online dating process.
</br></br>
With a focus on serious relationships, our members are looking for real connection and compatibility. If you to join a community of educated 
and engaging singles all over the world, PerfectMate could be just the fit for you. </br>The average age of our members is 25-60 years old and 85% 
of our members are highly educated. </br>With thousands of singles choosing PerfectMate and finding love each month, don’t miss out on your chance 
to meet the perfect match!
</br></br></br>
<center>
<a href="/login" class="button-home">Sign In</a>
</br></br></br></br>
<a href="/signup" class="button-home">Create a new account</a>
</center>
</body>
</html>
</br>
<?php
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
}
else {
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 
<meta name="author" content="Ayodeji Osasona">
<meta name="description" content="A perfect place for singles to meet for a serious relationship that leads to marriage"/>
<meta name="keywords" content="Perfectmate, matchmaking, dating, nigerian dating, perfectmate matchmaking, match, singles, dating site, website for dating, 9ja"/>
<style>
    body {
        margin-top : 0.2%;
    }
</style>

</head>
<title>Perfectmate Dating Site</title>

<body>
<center>
<center><img src="/images/banner.png" class="headimg2"/></center>
<div class="slideshow-container">
<?php
include $_SERVER['DOCUMENT_ROOT']."/scripts/userdata.php";
include $_SERVER['DOCUMENT_ROOT']."/scripts/age.php";

if($gender == "Male"){
    $sex = "Female";
}
if($gender == "Female"){
    $sex = "Male";
}

$fetch = "SELECT * FROM profile WHERE gender='$sex' AND (age='$age' OR age='$age_min1' OR age='$age_min2' OR age='$age_min3' OR age='$age_min4' OR age='$age_min5'
 OR age='$age_min6' OR age='$age_min7' OR age='$age_min8' OR age='$age_min9' OR age='$age_min10' OR age='$age_max1' OR age='$age_max2' OR age='$age_max3'
 OR age='$age_max4' OR age='$age_max5' OR age='$age_max6' OR age='$age_max7' OR age='$age_max8' OR age='$age_max9' OR age='$age_max10') ORDER BY rand()";

$query = mysqli_query($conn, $fetch);

while($match = mysqli_fetch_array($query)){
    $matchmail = $match["email"];
    $use = "SELECT * FROM users WHERE email='$matchmail'";
    $res = mysqli_query($conn, $use);

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
?>

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
<?php 
}
?>
</br></br></br>
</html>
