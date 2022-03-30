<?php
include "conn.php";
$dbname = "login";
session_start();

$sub = $_POST['sub'];
$res = $_POST['res'];
$date = $_POST['date'];
$user_id = $_SESSION['id'];
//$status = "ng";
// Create connection
$sql = "INSERT INTO `loginlev`( `sub`, `res`, `date`, `user_id`) VALUES ('$sub','$res','$date','$user_id')";
$result = mysqli_query($conn, $sql);
if($result == TRUE)
{
    echo "<script>alert('Inserted Successfully');window.location.href='leave.php';</script>";
}

?>