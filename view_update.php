<?php
include "conn.php";
$dbname = "login";
session_start();
     $id = $_POST['leave_id'];
    $status = $_POST['status'];

$query = "UPDATE `loginlev` SET `status`='$status' WHERE id = '$id'";
// echo $query;
$result   = mysqli_query($conn, $query);      
if ($query == TRUE) {
  echo "<script>alert('updated Successfully');window.location.href='dashboard.php';</script>";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
?>