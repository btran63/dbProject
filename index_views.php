<?php
include 'config.php';

function isLoggedIn(){
    if (!isset($_SESSION['logged_in'])){
        return False;
    }
    elseif ($_SESSION['logged_in'] == true){
        return True;
    }
    else{
        return False;
    }
}

?>
