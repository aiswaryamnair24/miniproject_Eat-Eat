

<?php
include "dbconnect.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:loginnew.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:loginnew.php');
}
$n=$_SESSION['uname'];
$q="select count(*) as c from tbl_login  where value = 0 ";

$result = mysqli_query($conn,$q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['c'];

?>
<!doctype html>
<html>
    <head>
    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
.hero{
  margin-top:20px;
  margin-left:20px;
  width: 350px;
}
.noti{
  position: relative;
  bottom: 180px;
  left: 900px;
}
</style>
    <link rel="stylesheet" href="new/style.css">
    <link rel="stylesheet" href="new/style2.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
   
    
        <div class="hero">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <?php
        echo "<h1>welcome,Admin </h1>";
        ?>
        <form method='post' action="">
        
        <button type="submit"  class="btn btn-outline-dark" name="but_logout">Logout</button>
        </form>
        </div>
        </div>
     

       
       <div class="noti">
        
         <a class="btn btn-dark" role="button" href="managerview.php">
    notifications <span class="badge bg-secondary"><?php echo "$count"; ?></span>
         </a>
         <!-- <a class="btn btn-dark" role="button" href="userview.php">
    usersview
         </a> -->
       </div>

       </table>
  </div>
  </div>



  <div id="sample2">
  
         

         <h4 ><strong>Users</strong></h4>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">date of join</th>
      <th scope="col">Status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$qu1="select * from tbl_registration";
$res1= mysqli_query($conn,$qu1);
if($res1)
{
  while($row2=mysqli_fetch_assoc($res1))
  {
    $id=$row2['id'];
    $username=$row2['username'];
    $useremail=$row2['useremail'];
    $date=$row2['date'];
    $status=$row2['status'];

   echo ' <tr>
   <th scope="row">'.$id.'</th>
   <td>'.$username.'</td>
   <td>'.$useremail.'</td>
   <td>'.$date.'</td> 
   
   <td><div id="status" style="font-weight:bold;color:red">'.$status.'</div></td> 
   <td>
   
   <a href="blockuser.php?block='.$username.'" type="button" class="btn btn-outline-danger">Block User</a>
   <a href="blockuser.php?unblock='.$username.'" type="button" class="btn btn-outline-primary">Unblock User</a>
</td>
 </tr>';
  }
}
?>



 
   
  
  </tbody>
</table>
</body>
    </head>
</html>
