<?php
include "dbconnect.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: loginnew.php');
}
$n=$_SESSION['uname'];
$q="select useremail from tbl_registration where username='".$n."'";

$result = mysqli_query($conn,$q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['useremail'];
//echo "Your Email is  $count";
?>
<!doctype html>
<html>
    <head>
    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
</style>
<!-- CSS only -->
<!-- JavaScript Bundle with Popper -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">   <link rel="stylesheet" href="new/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">    
</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Eat & Eat</a>
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
          District
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Trivananthapuram</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">District</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <div class="m-5">
        <?php
        echo "<h1>welcome, $count</h1>";
        ?>
        <form method='post' action="">
        
        <button type="submit"  class="btn btn-warning" name="but_logout">Logout</button>
        </form>
        </div>

        <h4 class="m-5"><strong>Users</strong></h4>
  <table class="table table-borderless m-5">
  <thead>
    <tr>
     
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">place</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$qu1="select * from tbl_agency";
$res1= mysqli_query($conn,$qu1);
if($res1)
{
  while($row2=mysqli_fetch_assoc($res1))
  {

    $username=$row2['mname'];
    $useremail=$row2['memail'];
    $place=$row2['mplace'];


   echo ' <tr>

   <td>'.$username.'</td>
   <td>'.$useremail.'</td>
   <td>'.$place.'</td> 
   
  
   <td>
   
   <a href="viewproduct.php?name='.$username.'" type="button" class="btn btn-outline-success">View Service</a>
  
</td>
 </tr>';
  }
}
?>

    </body>
</html>
