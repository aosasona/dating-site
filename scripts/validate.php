<?php

function validate() {
    if(isset($_COOKIE["email"])){
        return true;
    }
    else {
        return false;
    }
}

if(!validate()){
    echo '<meta http-equiv="refresh" content="0, url=/login">';
}
?>