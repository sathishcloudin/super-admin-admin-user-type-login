<?php
include "conn.php";
$id = $_GET['user_id'];
// sql to delete a record
$sql = "DELETE FROM loginsys WHERE id='$id'";
$result = mysqli_query($conn, $sql); 
if($result == TRUE){
  echo '<script>window.location="dashboard.php"</script>';
}
$conn->close();
?>