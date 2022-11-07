

<?php
include "dbconnect.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:login.php');
}
$n=$_SESSION['uname'];
$q="select count(*) as c from login  where value = 0 ";

$result = mysqli_query($conn,$q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['c'];

?>
<!doctype html>
<html>
    <head>
    <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        
         <a class="btn btn-dark" role="button" onclick="hide()">
    notifications <span class="badge bg-secondary"><?php echo "$count"; ?></span>
         </a>
         <a class="btn btn-dark" role="button" onclick="hide2()">
    users
         </a>
       </div>
         <!-- accept manager -->
         
          <!-- <script>
            var coum=; -->
            <!-- if(coum==0){
              var xy=document.getElementById("sample3");
            
              xy.style.display="none";
             
            }
          </script>
          <div id="sample3">hello</div> -->

          <script>
            function updateusr(username){
                $ajax({
                         url:"blockuser.php",
                         type:"post",
                         data:{
                            update:username
                         },
                         success:function(data,status){
                            display();
                         }
                })
            }
          </script>

<div id="sample">
  
         <div class="w-50 m-5">

    <h3>manager</h3>
  <table class="table table-bordered border-secondary table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">place</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$qu="select * from manager where value = 0 ";
$res= mysqli_query($conn,$qu);
if($res)
{
  while($row1=mysqli_fetch_assoc($res))
  {
    $m_id=$row1['m_id'];
    $mname=$row1['mname'];
    $mplace=$row1['mplace'];
    $memail=$row1['memail'];
   echo ' <tr>
   <th scope="row">'.$m_id.'</th>
   <td>'.$mname.'</td>
   <td>'.$mplace.'</td>
   <td>'.$memail.'</td> 
   <td>
 <a href="acceptmanager.php?accept='.$mname.'" type="button" class="btn btn-outline-success">Accept</a>
 <a href="acceptmanager.php?reject='.$mname.'" type="button" class="btn btn-outline-danger">Reject</a>


</td>
 </tr>';
  }
}
?>



 
   
  
  </tbody>
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
$qu1="select * from b";
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
   <a href="usermail.php?accept='.$username.'" type="button" class="btn btn-outline-success">Send Custom Mail</a>
   <a href="blockuser.php?block='.$username.'" type="button" class="btn btn-outline-danger">Block User</a>
   <a href="blockuser.php?unblock='.$username.'" type="button" class="btn btn-outline-primary">Unblock User</a>
</td>
 </tr>';
  }
}
?>



 
   
  
  </tbody>
</table>
  
</div>
    </body>
</html>


