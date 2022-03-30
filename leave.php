<?php 
include "auth_session.php";
$conn=mysqli_connect("localhost","root","","login");
?>
<html>
<body>

<form action="insert.php" method="post">
title: <input type="text" name="sub"><br><br>
reson: <textarea type="text" name="res"></textarea><br><br>
date: <input type="date" name="date"><br>
<br><button type="submit" name="insert">Submit</button></br>
</form>
<li><a href="dashboard.php">back</a></li>
<table border="2">
    <tr>
        <td>Date</td>
        <td>Reason</td>
        <td>Status</td>
    </tr>

    <?php
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `loginlev` where user_id = $id ";
    $res = mysqli_query($conn, $sql);
    while($rest = mysqli_fetch_array($res)){
    ?>
    <tr>        
        <td><?php echo $rest['date'];?></td>
        <td><?php echo $rest['sub'];?></td>
        <td><?php echo $rest['status'];?></td>
    </tr>
    <?php 
    }
    ?>
</table>
</body>
</html>

