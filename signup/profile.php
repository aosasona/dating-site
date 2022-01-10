<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
include "../scripts/header.php";
?>
<!DOCTYPE html>
<html class="account">
<head> 
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 
</head>
<title>PerfectMate Matchmaking - Sign Up</title>

<body>
<center>
<div class="row">
</br>
<h1>Sign Up -  Profile</h1></br>

<form action="/signup/profile.php" method="POST" enctype="multipart/form-data">
</br>

<div class="field3">
<div class="desc">Your date of birth</div>
    <input type="number" name="dd" placeholder="Day" required="required" min="01" max="31"/>
    <input type="number" name="mm" placeholder="Month" required="required" min="01" max="12"/>
    <input type="number" name="yyyy" placeholder="Year" required="required" min="1920" max="2050"/>
</div>

<div class="select">
<div class="desc">Your Gender</div>
<select name="gender" required="required">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
</select>
</div>

<div class="select">
<div class="desc">Why are you here?</div>
<select name="purpose" required="required">
            <option value="For short-term dating">For short-term dating</option>
            <option value="For long-term dating">For long-term dating</option>
            <option value="For marriage">For marriage</option>
            <option value="I don't know yet">I don't know yet...</option>
</select>
</div>
<div class="select">
<div class="desc">Body Type</div>
<select name="body_type" required="required">
              <option value="Slim">Slim</option>
              <option value="Athletic">Athletic</option>
              <option value="Curvy">Curvy</option>
              <option value="Average">Average</option>
</select>
</div>
</br>

<div class="select">
<div class="desc">Occupation</div>
<select name="occupation" required="required">
              <option value="Financial Service">Finance Service</option>
              <option value="Professional Service">Professional Service</option>
              <option value="Health Service">Health Service</option>
              <option value="Engineering">Engineering</option>
              <option value="Legal">Legal</option>
              <option value="Trade">Trade</option>
              <option value="Ask Me">Ask Me</option>
</select>
</div>
</br>

<div class="select">
<div class="desc">Religion</div>
<select name="religion" required="required">
              <option value="Christian">Christian</option>
              <option value="Muslim">Muslim</option>
              <option value="Others">Others</option>
              <option value="None">None</option>
</select>
</div>
</br>

<div class="select">
<div class="desc">Height</div>
<select name="height" required="required">
              <option value="Tall">Tall (> 6'1")</option>
              <option value="Average">Average (5'1" - 6'0")</option>
              <option value="Short">Short (< 5'0")</option>
</select>
</div>
</br>

<div class="select">
<div class="desc">Highest Educational Level</div>
<select name="education" required="required">
              <option value="High School Diploma">High School Diploma</option>
              <option value="Undergraduate Degree">Undergraduate Degree</option>
              <option value="Post-Graduate Degree">Post-Graduate Degree</option>
              <option value="Bachelor's Degree">Bachelor's Degree</option>
              <option value="Doctorate Degree">Doctorate Degree</option>
              <option value="Master's Degree">Master's Degree</option>
              <option value="Others">Others</option>
              <option value="None">None</option>
</select>
</div>
</br>

<div class="field">
<div class="desc">Number Of Children</div>
    <input type="number" name="children" placeholder="No. Of Children" required="required"/>

</div>

<div class="select">
<div class="desc">Genotype</div>
<select name="genotype" required="required">
              <option value="AA">AA</option>
              <option value="AS">AS</option>
              <option value="SS">SS</option>
              <option value="AC">AC</option>
              <option value="Others">Others</option>
              <option value="Ask Me">Ask Me</option>
</select>
</div>
</br>

<div class="select">
<div class="desc">Select a profile picture</div>
<input type="file" name="profile" id="profile" required="required"/></br>
</div></br>

<div class="select">
<div class="desc">Add a picture to your profile</div>
<input type="file" name="photo1" id="photo1" required="required"/></br>
</div></br>

<div class="select">
<div class="desc">Add another picture to your profile</div>
<input type="file" name="photo2" id="photo2" required="required"/></br>
</div></br>

<div class="select">
<div class="desc">Relationship Status</div>
<select name="status" required="required">
              <option value="Single">Single</option>
              <option value="Divorced">Divorced</option>
              <option value="Widowed">Widowed</option>
              <option value="Ask me">Ask me</option>
</select>
</div>
</br>
<textarea name="bio" class="bio" placeholder="A short bio (public)... Max. 100 characters" maxlength="100" minlength="25" required="required"></textarea></br>
</br>
<textarea name="about" class="about" placeholder="Describe the kind of person you want... Max. 1000 characters" maxlength="1000" minlength="50" required="required"></textarea>

</br></br>
<input type="submit" name="register" class="button-home" value="Sign Up &rarr;"/>
</form>

</center>
</br>
</div>
</body>
</br></br></br></br>
<?php
date_default_timezone_set("Africa/Lagos");
$cc = date('Y');
echo "<center>";
echo '<small class="footer">&copy; '.$cc.' Perfectmate Matchmaking</br></small>';
?>
</html>

<?php

if(isset($_POST["register"])){
    $email = $_SESSION["email"];
    $dob = $_POST["yyyy"]."/".$_POST["dd"]."/".$_POST["mm"];
    $gender = $_POST["gender"];
    $purpose = $_POST["purpose"];
    $purpose = addslashes($purpose);
    $status = $_POST["status"];
    $bio = htmlspecialchars(addslashes($_POST["bio"]));
    $about = htmlspecialchars(addslashes($_POST["about"]));
    $body = $_POST["body_type"];
    $occupation = $_POST["occupation"];
    $religion = $_POST["religion"];
    $height = $_POST["height"];
    $education = htmlspecialchars(addslashes($_POST["education"]));
    $children = $_POST["children"];
    $genotype = $_POST["genotype"];

//CURRENT DATE
    date_default_timezone_set("Africa/Lagos");
    $date = date('Y/d/m');
    $current_year = date('Y');
    $current_month = date('m');

//BIRTH DATE 
    $split = explode('/', $dob);
    $birth = implode('', $split);
    $birth_month = substr($birth, -2);
    $birth_year = substr($birth, 0, 4);

$age = $current_year - $birth_year;

if($age >= 18) {

//PROFILE PICTURE UPLOAD

$dir = "../images/";
$file = $dir.basename($_FILES["profile"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$profile = "/images/".$_FILES["profile"]["name"];
$image_name = $_FILES["profile"]["name"];

//Upload file
move_uploaded_file($_FILES["profile"]["tmp_name"], $file);


//PHOTO 1 UPLOAD

$dir = "../images/";
$file = $dir.basename($_FILES["photo1"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$photo1 = "/images/".$_FILES["photo1"]["name"];
$image_name = $_FILES["photo1"]["name"];

//Upload file
move_uploaded_file($_FILES["photo1"]["tmp_name"], $file);


//PHOTO 2 UPLOAD

$dir = "../images/";
$file = $dir.basename($_FILES["photo2"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$photo2 = "/images/".$_FILES["photo2"]["name"];
$image_name = $_FILES["photo2"]["name"];

//Upload file
move_uploaded_file($_FILES["photo2"]["tmp_name"], $file);

//ADD TO THE PROFILE TABLE
$insert = "INSERT INTO profile(email, dob, gender, age, purpose, dp, photo1, photo2, status, bio, about, body_type, occupation, religion, height, 
education, children, genotype) VALUES('$email', '$dob', '$gender', '$age', '$purpose', '$profile', '$photo1', '$photo2', '$status', '$bio', 
'$about', '$body',  '$occupation',  '$religion',  '$height',  '$education',  '$children',  '$genotype')";

mysqli_query($conn, $insert) or die(mysqli_error($conn));
echo '<meta http-equiv="refresh" content="0, url=/login">';
?>
<script>
alert("You can login now!");
</script>
<?php
}
else {
//DELETE ACCOUNT
    $delete = "DELETE FROM users WHERE email='$email'";
    mysqli_query($conn, $delete);
    session_destroy();

    echo '<meta http-equiv="refresh" content="0, url=/signup">';
   ?>
<script>
alert("You must be older than 17 to sign up (18+)");
</script>
<?php
}
}   

?>