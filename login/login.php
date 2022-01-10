<?php
error_reporting(-1);
include $_SERVER['DOCUMENT_ROOT']."/scripts/connect.php";
if(isset($_POST["signin"])){

    $user = $_POST["username"];
    $user = strToLower($user);
    $pass = $_POST["password"];
    $_SESSION["msg"] = "";

    $select = "SELECT * FROM users WHERE email='$user'";
    $check = mysqli_query($conn, $select);

    $num = mysqli_num_rows($check);
    
    //If user doesn't exist, redirect to login page and echo an error

    if($num < 1){
        echo '<meta http-equiv="refresh" content="0, url=/login">';
?>
<script>
    alert("User not found! Check your email address and try again");
    </script>
<?php
    }
    else {

        $passcheck = "SELECT * FROM users WHERE email='$user'";
        $que = mysqli_query($conn, $passcheck);

        while($data = mysqli_fetch_array($que)){

            $password = $data["password"];
            $pass = md5($pass);
            $name = $data["display"];

            //Check if the password entered matches the one in the database

            if($pass == $password){

                //Session variable declaration
                $_SESSION["msg"] = "";

                setcookie("email", $user, time() + (3600*24*30), "/");
                setcookie("name", $name, time() + (3600*24*30), "/");

                   //Take user to creator dashboard
                echo '<meta http-equiv="refresh" content="0, url=/index.php">'; 

                
            } else {
                echo '<meta http-equiv="refresh" content="0, url=/login">';
?>
<script>
    alert("Incorrect pasword! Try again");
    </script>
<?php

            }
        }
    }
}
?>