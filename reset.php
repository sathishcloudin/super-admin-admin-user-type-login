<?php
 session_start();
$user_id = base64_decode($_GET['user_id']);
include "conn.php";
if (isset($_POST['password']))  
{
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    if($pass != $cpass){
        echo "<p>In correct password</p>"; 
    }
    else{
$query = mysqli_query($conn,"SELECT * FROM `loginsys` WHERE id = $user_id");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($conn,"UPDATE loginsys set  `password` ='" . md5($pass) . "'  WHERE id = $user_id");
echo '<p>Congratulations! Your password has been updated successfully.</p>';
}else{
echo "<p>Something goes wrong. Please try again</p>";
}
}
}
?>
<form class="form" action="#" method="post">
        <h1 class="login-title">conifirm password</h1>
        <input type="password" class="input" name="password" placeholder=" Password" required>
        <input type="password" class="input" name="cpassword" placeholder="conifirm Password" required>
        <input type="submit" name="submit" value="submit" class="button">
     </form>
  
    <?php


