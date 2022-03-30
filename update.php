<?php
include "conn.php";
$dbname = "login";
session_start();
    $id = $_SESSION['id'];
    $username = $_POST['username'];

$query = "UPDATE `loginsys` SET `username`='$username' WHERE id = '$id'";
$result   = mysqli_query($conn, $query);      
//echo $sql;
if ($query == TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
//$target_path = "";  
$target_path = basename( $_FILES['file']['name']); 
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {  
  //update query with file name ($target_path)
  $query = "UPDATE `loginsys` SET `file`='$target_path' WHERE id = '$id'";
  echo $query;
  $result   = mysqli_query($conn, $query);    
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
$conn->close();
?>