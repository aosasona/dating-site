<head>
<meta property="og:image" content="/images/favicon.png">
<link rel="icon" href="/images/favicon.png">
    <meta name="description" content="A perfect place for singles to meet for a serious relationship that leads to marriage"/>
    <meta name="keywords" content="Perfectmate, matchmaking, dating, nigerian dating, perfectmate matchmaking, match, singles, dating site, website for dating, 9ja"/>
</head>
<?php
$email = $_COOKIE["email"];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($result);
    $_SESSION["id"] = $data["id"];
    $_SESSION["first"] = $data["first"];
    $_SESSION["last"] = $data["last"];
    $_SESSION["display"] = $data["display"];
    $_SESSION["location"] = $data["location"];
    $_SESSION["account_status"] = $data["account_status"];
    $_SESSION["phone"] = $data["phone"];


$take = "SELECT * FROM profile WHERE email='$email'";
$pro = mysqli_query($conn, $take);

$dat = mysqli_fetch_array($pro);

    $_SESSION["dob"] = $dat["dob"];
    $_SESSION["gender"] = $dat["gender"];
    $_SESSION["age"] = $dat["age"];
    $_SESSION["purpose"] = $dat["purpose"];
    $_SESSION["dp"] = $dat["dp"];
    $_SESSION["photo1"] = $dat["photo1"];
    $_SESSION["photo2"] = $dat["photo2"];
    $_SESSION["status"] = $dat["status"];
    $_SESSION["bio"] = $dat["bio"];
    $_SESSION["about"] = $dat["about"];
    $_SESSION["body_type"] = $dat["body_type"];
    $_SESSION["occupation"] = $dat["occupation"];
    $_SESSION["religion"] = $dat["religion"];
    $_SESSION["height"] = $dat["height"];
    $_SESSION["education"] = $dat["education"];
    $_SESSION["children"] = $dat["children"];
    $_SESSION["genotype"] = $dat["genotype"];


//GLOBAL VARIABLE DECLARATION
$id = $_SESSION["id"];
$first = $_SESSION["first"];
$last = $_SESSION["last"];
$display = $_SESSION["display"];
$location = $_SESSION["location"];
$account_status = $_SESSION["account_status"];
$dob = $_SESSION["dob"];
$gender = $_SESSION["gender"];
$age = $_SESSION["age"];
$purpose = $_SESSION["purpose"];
$dp = $_SESSION["dp"];
$photo1 = $_SESSION["photo1"];
$photo2 = $_SESSION["photo2"];
$status = $_SESSION["status"];
$bio = $_SESSION["bio"];
$about = $_SESSION["about"];
$phone = $_SESSION["phone"];
$body = $_SESSION["body_type"];
$occupation = $_SESSION["occupation"];
$religion = $_SESSION["religion"];
$height = $_SESSION["height"];
$children = $_SESSION["children"];
$education = $_SESSION["education"];
$genotype = $_SESSION["genotype"];
?>