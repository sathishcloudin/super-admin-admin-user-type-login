<?php 
include "auth_session.php";
$conn=mysqli_connect("localhost","root","","login");
?>
<html>
<body>
    <?php
    $id = $_GET['leave_id'];
    $sql = "SELECT * FROM `loginlev` where id = $id ";
    // echo $sql;
    $res = mysqli_query($conn, $sql);
    $rest = mysqli_fetch_array($res);
    ?>
<form action="view_update.php" method="post">
<input type="hidden" name="leave_id" value="<?php echo  $id;?>"/>
title: <input type="text" name="sub" value="<?php echo $rest['sub'];?>"><br><br>
reson: <textarea type="text" name="res"><?php echo $rest['res'];?></textarea><br><br>
date: <input type="date" name="date" value="<?php echo $rest['date'];?>"><br>
<br>status:
        <?php if($rest['status'] == "pending"){?>
        <select name="status"><br>
            <option  value="">Select</option>
            <option  value="accepted">accepted</option>
            <option  value="declined">declined</option>
        </select><br>
        <?php }
        else{
            echo ucwords($rest['status']);
        }
        ?>
<br><button type="submit" name="insert">Submit</button></br>
<li><a href="dashboard.php">back</a></li>
</form>
</body>
</html>