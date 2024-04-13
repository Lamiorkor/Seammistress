<?php

session_start();

function userIDSessionCheck() {  
    if (!isset($_SESSION['user_id'])) {
        header("Location:../login/login_and_register_view.php");
        die("Please login again");
    } 
}

?>
