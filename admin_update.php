<?php
include "conn.php";
$dbname = "login";
session_start();
    $id = $_POST['user_id'];
    $adminid = $_POST['username'];

$query = "UPDATE `loginsys` SET `adminid`='$adminid' WHERE id = '$id'";
$result   = mysqli_query($conn, $query);      
 echo $query;
 if ($query == TRUE) { 
        echo "<script>alert('Your new admin assigned Update Sucessfully'); window.location='dashboard.php'</script>";
      }
      else{
        echo "<script>alert('not assigned new admin '); window.location='view.php'</script>";
      }
    
$conn->close();
?>