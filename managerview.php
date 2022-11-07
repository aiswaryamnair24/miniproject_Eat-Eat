

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Eat and Eat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
   
    
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
        
         <!-- <a class="btn btn-dark" role="button" href="managerview.php">
    notifications <span class="badge bg-secondary">
       
         ?></span>
         </a> -->
         <a class="btn btn-dark" role="button" href="userview.php">
    usersview
         </a>
       </div>
        <body>
        <h3>manager</h3>
  <table class="table table-bordered border-secondary">
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
$qu="select * from tbl_agency where value = 0 ";
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
        </body>
    </head>
</html>
