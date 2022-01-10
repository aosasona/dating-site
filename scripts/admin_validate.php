<?php

function validate() {
    if(isset($_COOKIE["admin"])){
        return true;
    }
    else {
        return false;
    }
}

if(!validate()){
    echo '<meta http-equiv="refresh" content="0, url=/siteadmin">';
}
?>