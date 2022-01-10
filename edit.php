<?php
session_start();
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
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
        background : #BBB;
        color : black;
    }
</style>
<title>Edit Profile</title>

<body>
<center>
</br>
<h1>Edit Profile</h1></br>

<form action="/edit.php" method="POST" enctype="multipart/form-data">
</br>

<div class="field">
    <input type="date" name="dob" placeholder="Date Of Birth" required="required" value=<?php echo '"'.$dob.'"'; ?>/>
<div class="desc">Your date of birth</div>
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
<input type="file" name="profile" id="profile" required="required" /></br>
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
<select name="status" required="required" >
              <option value="Single">Single</option>
              <option value="Divorced">Divorced</option>
              <option value="Widowed">Widowed</option>
              <option value="Ask me">Ask me</option>
</select>
</div>
</br>
<textarea name="bio" class="bio" placeholder="A short bio (public)... Max. 100 characters" maxlength="100" minlength="25"> <?php echo $bio; ?></textarea></br>
</br>
<textarea name="about" class="about" placeholder="Describe the kind of person you want to meet... Max. 1000 characters" maxlength="1000" minlength="50"> <?php echo $about; ?></textarea>

</br></br>
<input type="submit" name="register" class="button-home" value="&larr; Save Changes"/>
</form>

</center>
</br>
</body>
</html>

<?php

if(isset($_POST["register"])){
    $dob = $_POST["dob"];
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


//PROFILE PICTURE UPLOAD

$dir = $_SERVER['DOCUMENT_ROOT']."/images/";
$file = $dir.basename($_FILES["profile"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$profile = "/images/".$_FILES["profile"]["name"];
$image_name = $_FILES["profile"]["name"];

//Upload file
move_uploaded_file($_FILES["profile"]["tmp_name"], $file);


//PHOTO 1 UPLOAD

$dir = $_SERVER['DOCUMENT_ROOT']."/images/";
$file = $dir.basename($_FILES["photo1"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$photo1 = "/images/".$_FILES["photo1"]["name"];
$image_name = $_FILES["photo1"]["name"];

//Upload file
move_uploaded_file($_FILES["photo1"]["tmp_name"], $file);


//PHOTO 2 UPLOAD

$dir = $_SERVER['DOCUMENT_ROOT']."/images/";
$file = $dir.basename($_FILES["photo2"]["name"]);
$uploadfilevalue = 1;
$filetype = pathinfo($file.PATHINFO_EXTENSION);
$photo2 = "/images/".$_FILES["photo2"]["name"];
$image_name = $_FILES["photo2"]["name"];

//Upload file
move_uploaded_file($_FILES["photo2"]["tmp_name"], $file);
//ADD TO THE PROFILE TABLE
$insert = "UPDATE profile SET dob='$dob', age='$age', purpose='$purpose', body_type='$body', occupation='$occupation', religion='$religion',
 height='$height', education='$education', children='$genotype', height='$genotype', dp='$profile', photo1='$photo1', photo2='$photo2', status='$status', bio='$bio', about='$about' WHERE email='$email'";

mysqli_query($conn, $insert) or die(mysqli_error($conn));
echo '<meta http-equiv="refresh" content="0, url=/account.php">';
?>
<script>
alert("Changes have been saved successfully!");
</script>
<?php
}
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>