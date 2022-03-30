<?php
    session_start();
    //session_destroy();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        //print_r($_SESSION);
        header("Location: login.php");
    }
?>