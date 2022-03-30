<?php
 session_start();
include "conn.php";
$id = $_SESSION['id'];
if(isset($_POST['re_password']))
  {
  $password=md5($_POST['password']);
  $epassword=md5($_POST['epassword']);
  $pass = $_POST['epassword'];
  $cpassword=$_POST['cpassword'];
  $chg_pwd=mysqli_query($conn,"SELECT * FROM `loginsys` WHERE id = '$id'");  
  $chg_pwd1=mysqli_fetch_array($chg_pwd);
  $data_pwd=$chg_pwd1['password'];    
  if($data_pwd==$password){
  if($pass==$cpassword){
    $update_pwd=mysqli_query($conn,"UPDATE `loginsys` set  `password` ='" . $epassword . "' WHERE id='$id'");
    echo "<script>alert('Update Sucessfully'); window.location='password.php'</script>";
  }
  else{
    echo "<script>alert('Your new and Retype Password is not match'); window.location='password.php'</script>";
  }

  }
  else
  {
  echo "<script>alert('Your old password is wrong'); window.location='password.php'</script>";
  }
}
?>