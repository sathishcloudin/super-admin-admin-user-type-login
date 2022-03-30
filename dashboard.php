<?php 
include "auth_session.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1>

</body>
</html>
<?php

$con=mysqli_connect("localhost","root","","login");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//admin start
if($_SESSION['usertype'] == 'admin'){
  $id = $_SESSION['id'];
  echo'<ul>
  <li><a href="leave.php">add_leave</a></li>
    <li><a href="user_leaves.php">user_leaves</a></li>
    <li><a href="logout.php">log out</a></li>
  </ul>';
  $result = mysqli_query($con,"SELECT * FROM `loginsys` where usertype = 'user' and adminid = $id");  
  if(mysqli_num_rows($result) >= 1){
  echo "<h3>User's List : </h3><table border='1'>
  <tr>
  <th>usertype</th>
  </tr>";
  ?>
   
  <?php
  while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>"."<a href='view.php?user_id=".$id."'>View </td>";
  ?>
  <td>
  <button onclick="confirmation('<?php echo $id;?>')">Delete</button>
  </td>
  
  <?php 
  echo "</tr>";
  }
  echo "</table>";
 }
  else{
        echo "There's No data found!!!";
  }
  //leave table

  echo '<b>Leave Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>Total Leave</th>
  <th>Today Leave</th>
  <th>Total Accepcted</th>
  <th>Total Declined</th>
  <th>Total Pending</th>

  </tr>";  
  // array 
  $accepted =  array();
  $declined = array();
  $pending = array();
  $today = array();
  $date = date('Y-m-d');
  $id = $_SESSION['id'];
  // echo "SELECT la.date,la.status FROM loginsys ls INNER JOIN loginlev la ON ls.id= la.user_id WHERE ls.adminid = $id";
  $result = mysqli_query($con,"SELECT la.date,la.status FROM loginsys ls INNER JOIN loginlev la ON ls.id= la.user_id WHERE ls.adminid = $id");
  // fetch
  while($row = mysqli_fetch_array($result))
  {
    if($row['date'] == $date){
      array_push($today,"1");
    }
    if($row['status'] == 'accepted')
    {      
      array_push($accepted,"1");
    }  
    elseif($row['status'] == 'declined')
    {      
      array_push($declined,"1");
    }  
    else{
      array_push($pending,"1");
    }
  }
  ?>
  <tr>
  <td><?php echo count($accepted) + count($declined) + count($pending);?></td>
  <td><?php echo count($today);?></td>
  <td><?php echo count($accepted);?></td>
  <td><?php echo count($declined);?></td>
  <td><?php echo count($pending);?></td>
 </tr>
 </table>
  <?php
 
}
//admin ends here
//super starts here
elseif($_SESSION['usertype'] == 'super'){
  $result = mysqli_query($con,"SELECT * FROM `loginsys` where usertype = 'admin'");
   // table
  echo '<b>Admin</b>';
  echo "<table border='1'>
  <tr>
  <th>username</th>
  <th>password</th>
  </tr>";
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  }
  echo "</table>";

  $result = mysqli_query($con,"SELECT * FROM `loginsys` where usertype = 'user'");
  echo '<b>User</b>';
  echo "<table border='1'>
  <tr>
  <th>username</th>  
  </tr>";
  
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  $id = $row['id'];
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>"."<a href='view.php?user_id=".$id."'>View </td>";
  
  }
  // table
  echo "</table>";
  echo '<b>Leave Table</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>Total Leave</th>
  <th>Today Leave</th>
  <th>Total Accepcted</th>
  <th>Total Declined</th>
  <th>Total Pending</th>
  <th>view</th>
  </tr>"; 
  // array 
  $accepted =  array();
  $declined = array();
  $pending = array();
  $today = array();
  $date = date('Y-m-d');
  $id = $_SESSION['id'];
  // echo "SELECT la.date,la.status FROM loginsys ls INNER JOIN loginlev la ON ls.id= la.user_id WHERE ls.adminid = $id";
  $result = mysqli_query($con,"SELECT la.date,la.status FROM loginsys ls INNER JOIN loginlev la ON ls.id= la.user_id WHERE ls.usertype = 'admin'");
  while($row = mysqli_fetch_array($result))
  {
    if($row['date'] == $date){
      array_push($today,"1");
    }
    if($row['status'] == 'accepted')
    {      
      array_push($accepted,"1");
    }  
    elseif($row['status'] == 'declined')
    {      
      array_push($declined,"1");
    }  
    else{
      array_push($pending,"1");
    }
  }
  ?>
  <tr>
  <td><?php echo count($accepted) + count($declined) + count($pending);?></td>
  <td><?php echo count($today);?></td>
  <td><?php echo count($accepted);?></td>
  <td><?php echo count($declined);?></td>
  <td><?php echo count($pending);?></td>
  <td><a href='admin_leave.php?user_id=".$id."'>View </td>
 </tr>
 </table> 
  <li><a href="logout.php">log out</a></li>
  <?php
}
//super ends here
//user starts here
else{ 
  //select query
  $id = $_SESSION['id'];
   //query execete
  $result = mysqli_query($con,"SELECT * FROM `loginsys` where id = '$id'");
    //fetch
  $row = mysqli_fetch_array($result);
        echo "I am a user";
 ?>     
  <ul>
    <li><a href="leave.php">leave</a></li>
    <li><a href="myprofile.php">myprofile</a></li>
    <li><a href="password.php">change password</a></li>
    <li><a href="logout.php">log out</a></li>
  </ul>
  <tr><br><img src="<?php echo $row['file'];?>" alt="" width="200" height="200"></tr></br> 
    
  <!-- img tag html -->
  <!-- src="$row['username']" -->
  <?php 
  echo '<b>Leave Count</b>';
  echo "<table border='1' style='width:75%'>
  <tr>
  <th>Total Leave</th>
  <th>Total Accepcted</th>
  <th>Total Declined</th>
  <th>Total Pending</th>
  </tr>";  
  $accepted =  array();
  $declined = array();
  $pending = array();

  $result = mysqli_query($con,"SELECT `status` FROM `loginlev` WHERE user_id='$id'");
  while($row = mysqli_fetch_array($result))
  {
    if($row['status'] == 'accepted')
    {      
      array_push($accepted,"1");
    }  
    elseif($row['status'] == 'declined')
    {      
      array_push($declined,"1");
    }  
    else{
      array_push($pending,"1");
    }
}
//user end
?> 
<tr>
  <td><?php echo count($accepted) + count($declined) + count($pending);?></td>
  <td><?php echo count($accepted);?></td>
  <td><?php echo count($declined);?></td>
  <td><?php echo count($pending);?></td>
  
</tr>
</table>
<?php 
//print_r($accepted);
}
mysqli_close($con);
?> 
<script>
   function confirmation(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        window.location="delete.php?user_id="+id;
    }
   }
</script>