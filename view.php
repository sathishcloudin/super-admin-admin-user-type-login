<?php  
 session_start();
include "conn.php";
 $id = $_GET['user_id'];
 $sql = "SELECT * FROM `loginsys` where id = '$id'";  
 //echo $sql;
 $result = mysqli_query($conn, $sql); 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      </head>  
      <body>  
          <br/>  
               <h3 align=""></h3><br/>                 
               <div class="table-responsive">  
                    <table class="table table-striped">  
                         <?php  
                              $row = mysqli_fetch_array($result);     
                              $admin_id =  $row['adminid'];                    
                          ?>  
                          <tr>  
                              <th>USER NAME  : </th>   
                              <td><b><?php echo $row["username"]; ?></b></td>   
                          </tr>                           
                          <tr>                                
                              <form class="form" method="post" name="login"  action="admin_update.php">                                     
                              <input type="hidden" name="user_id" value="<?php echo  $id;?>"/>
                              <tr><br><img src="<?php echo $row['file'];?>" alt="" width="500" height="600"></tr></br>                      
                              <?php
                                   $id = $_SESSION['id'];
                                   $sql = ("SELECT * FROM `loginsys` where id = '$id'");
                                   $result = mysqli_query($conn,$sql);                              
                                   $sql =("SELECT * FROM `loginsys` where usertype = 'user'");
                                   $result = mysqli_query($conn,$sql);
                                   $row = mysqli_fetch_array($result)
                              ?>
                              <h3>Select Admin</h3>
                              <select name="username" id="username" class="form-control-label">
                                   <option value="">Select Admin</option>
                                   <?php
                                        $qry = mysqli_query($conn,"SELECT * FROM `loginsys` where usertype = 'admin'");
                                             while ($row_ah = mysqli_fetch_assoc($qry)) { 
                                                  if($admin_id == $row_ah['id'])
                                                  {
                                                       $sel = "selected";
                                                  }
                                                  else{
                                                       $sel = "";
                                                  }
                                   ?>
                                   <option value="<?php echo $row_ah['id']; ?>" <?php echo $sel;?>><?php echo $row_ah['username']; ?></option>
                                   <?php } ?>
                              </select>
                              </br>
                         </tr>   
                         <br><br><button type="submit" name="update">assign admin </button></br></br>                                                  
                    </table>  
               </div>  
          </div>  
          <br />  
     </body>  
</html>  