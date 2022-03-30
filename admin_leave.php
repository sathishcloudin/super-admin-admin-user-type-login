<?php 
include "auth_session.php";
$conn=mysqli_connect("localhost","root","","login");
?>
<html>
<body>    
<table border="2" style="width:100%">
<thead>admin's Leave List</thead>
    <tr>
       <th>username</th>
        <th>date</th>
        <th>Reason</th>
        <th>Status</th>
        <th>action</th>
    </tr>
    <?php
    $id = $_SESSION['id'];
    // $sub = $_POST['sub'];
    $sql = "SELECT ls.username,la.date,la.status,la.id,la.sub FROM loginsys ls INNER JOIN loginlev la ON ls.id= la.user_id WHERE ls.usertype = 'admin'";
    $res = mysqli_query($conn, $sql);
    while($rest = mysqli_fetch_array($res)){
        $id = $rest['id'];
    ?>
    <tr>       
    <td><?php echo $rest['username'];?></td>    
        <td><?php echo $rest['date'];?></td>
        <td><?php echo $rest['sub'];?></td>
        <td><?php echo $rest['status'];?></td> 
        <td><a href='adminleavepage.php?leave_id=<?php echo $id;?>'>View </a></td>   
    <?php 
    }
    ?>
</table>
<li><a href="dashboard.php">back</a></li>
</body>
</html>