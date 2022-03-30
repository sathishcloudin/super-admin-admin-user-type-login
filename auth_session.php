<?php
    session_start();
    if(!isset($_SESSION["usertype"])) {
        header("Location: login.php");
        exit();
    }
?>