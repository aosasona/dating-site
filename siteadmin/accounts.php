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
        margin-top : 0.5%;
        background : black;
        color : white;
    }
</style>

<script>
    function show(){
        var x = document.getElementById("all");

        if(x.style.display == "none"){
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
</head>
<title>Manage Accounts</title>

<body>
</br><center><h1>Accounts</h1></center></br></br>
<center>
<form action="/siteadmin/accounts.php" method="GET">
<div class="search">
    <input type="text" name="query" placeholder="Enter (part of) username or email..." minlength="2"/>
</div>
<button type="submit" class="button-no" name="search">Search</button>
</form>

<?php
if(isset($_GET["search"])){
$query = $_GET["query"]; 
$min_length = 2;

if(strlen($query) >= $min_length){ 
echo "</br></br><h2>Search Results</h2></br>";
// Changes characters used in html to their equivalents
$query = htmlspecialchars($query); 

// Prevents SQL injection
    $query = mysqli_real_escape_string($conn, $query);

    // The SQL syntax for the music database search
    $ql = "SELECT * FROM users WHERE (`display` LIKE '%".$query."%') OR (`email` LIKE '%".$query."%') ORDER BY id DESC";
    $raw_results = mysqli_query($conn, $ql);

    if(mysqli_num_rows($raw_results) > 0){
        echo '<div class="scroll"><table style="width:100%;">';
        echo '<tr><th>Username</th><th>Email Address</th><th>Account Type</th><th>Action</th></tr>';
        while($show = mysqli_fetch_array($raw_results)){
            echo '<tr><td class="title">'.$show["display"].'</td>';
            echo '<td>'.$show["email"].'</td>';
            echo '<td>'.$show["account_status"].'</td>';
            echo '<td><a href="/siteadmin/view_profile.php?display_name='.$show["display"].'" class="action">View Profile</a></td></tr>';
        }
        echo "</table>";
    }
}
}
?>

</br></br>
<button onclick="show()" class="showall">Show All Users</button>
</br></br>
</center>
<div class="all" id="all">
<?php
$select = "SELECT * FROM users ORDER BY display ASC";
$query2 = mysqli_query($conn, $select);

echo '<div class="scroll"><table style="width:100%;">';
echo '<tr><th>Username</th><th>Email Address</th><th>Account Type</th><th>Action</th></tr>';

while($report = mysqli_fetch_array($query2)){
    echo '<tr><td class="title">'.$report["display"].'</td>';
    echo '<td>'.$report["email"].'</td>';
    echo '<td>'.$report["account_status"].'</td>';
    echo '<td><a href="/siteadmin/view_profile.php?display_name='.$report["display"].'" class="action">View Profile</a></td></tr>';
}

echo "</table>";
?>
</div>