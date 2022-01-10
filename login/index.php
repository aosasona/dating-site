<?php
error_reporting(-1);
include "../scripts/header.php";
?>
<!DOCTYPE html>
<html class="account">
<head> 
<link rel="stylesheet" href="/css/home.css" type="text/css"/> 
</head>
<title>PerfectMate Matchmaking - Sign In</title>

<body>
<center>
<div class="row">
</br>
<h1>Sign In </h1>

<form action="/login/login.php" method="POST">
</br></br>

<div class="field">
    <input type="email" name="username" placeholder="eMail Address" required="required"/>
<div class="desc">Your account's email address eg. skrillex19@gmail.com</div>
</div>

</br>

<div class="field">
    <input type="password" name="password" placeholder="Your Password" required="required"/>
<div class="desc">Your account's password eg. Iamaboy15#</div>
</div>

</br>
<input type="submit" name="signin" class="button-home" value="Sign In"/></br></br>
<b>OR</b>
</br></br></br>
<a href="/signup" class="button-home">Create a new account</a>
</form>
</br>

</br></br>

<a href="/forgot-password" class="link">Forgot Password?</a>
</br></br>
</center>
</div>
</br></br></br></br>
<?php
date_default_timezone_set("Africa/Lagos");
$cc = date('Y');
echo "<center>";
echo '<small class="footer">&copy; '.$cc.' Perfectmate Matchmaking</br></small>';
?>
</body>
</html>