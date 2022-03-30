<?php
 session_start();
 if(isset($_POST) & !empty($_POST)){
include "conn.php";
$email = $_POST['email'];
$sql = "SELECT * FROM `loginsys` where email='$email'";
$res = mysqli_query($conn, $sql);
$rest = mysqli_fetch_array($res);
$count = mysqli_num_rows($res);
if($count > 0){

$user_id = base64_encode($rest['id']);  
    
//redirect to rest.php?user_id=$user_id 
header("Location: reset.php?user_id=".$user_id);  

}else{
echo "User name does not exist in database";
}
 }
?>
        <form class="form" method="post" name="login" action="#">
        <h1 class="email verification">email verification</h1>
        <input type="text" class="input" name="email" placeholder="conifirm email" required />      
        <button type="submit">Submit</button>
        </form>
        
        