<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('conn.php');
    // When form submitted, check and create user session.
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
         
        // Check user is exist in the database
        $query    = "SELECT * FROM `loginsys` WHERE  email='$email'
                     AND password='" . md5($password) . "'";                
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $res = mysqli_fetch_array($result); 

          @$role = $res['usertype'];        
          @$stat = $res['status'];
        $rows = mysqli_num_rows($result);
       
     
        if ($rows == 1) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['usertype'] = $role;
            $_SESSION['id'] = $res['id'];
            //print_r($_SESSION);die();
            // Redirect to user dashboard page
          header("Location: dashboard.php");
            
        }
       // else if ($stat == 1){       
           // echo ("please verify ur account");
       // }
         else {
                     echo "<div class='form'>
                  <h3>Incorrect Useremail/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
        }
  
     
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="useremail" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        <p class="link"><a href="forget.php">reset password</a></p>
  </form>

</body>
</html>
