<?php
if(isset($_POST["login"])){
    $password = $_POST["password"];

    if($password == "Perfectmate2021"){
        setcookie("admin", "ADMIN", time() + (300*24*7), "/");
        echo '<meta http-equiv="refresh" content="0, url=/siteadmin/main.php">';
    }
    else {
        echo '<meta http-equiv="refresh" content="0, url=/siteadmin">';
?>
<script>
    alert("Incorrect password!!");
</script>
<?php
    }
}
?>