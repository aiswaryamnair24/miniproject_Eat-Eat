
<?php
include "dbconnect.php";
$managererr=false;
$managerreject=false;
$error=false;
if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    
 

   // $hash = password_hash($password, 
                               // PASSWORD_DEFAULT);

    if ($uname != "" && $password != ""){
        
       

        $sql_query = "select count(*) as cntUser,value as val from tbl_login where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count1 = $row['cntUser'];
        $v=$row['val'];
       
       
        if($count1 > 0){
            if($v=="2")
            {
                $_SESSION['uname'] = $uname;
                header('Location:home.php');
            }
            elseif($v=="10")
            {
                $_SESSION['uname'] = $uname;
                header('Location: admin.php');
            }
            elseif($v=="0")
            {
                $_SESSION['uname'] = $uname;
                $managererr="yet to be verified by admin";
                
            }
            elseif($v=="5")
            {
                $_SESSION['uname'] = $uname;
                $managerreject="Rejected by admin";
                
            }
            
           elseif($v=="1"){
            $_SESSION['uname'] = $uname;
           header('Location: managerhome.php');
           }
        }
        else{
           $error= "Invalid username and password";
        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="./images/022.png">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Login Form with Blue Background</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
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
<style>
   
    body {
        color: #fff;
        background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.3)),url(images/bg_1.jpg);
        font-family: 'Roboto', sans-serif;
        /* background-image:url(images/bg_1.jpg); */
        background-repeat: no-repeat;
  background-size: cover;
  z-index: -1;
 

 

    }


    .form-control{
        
        height: 41px;
        background: #f2f2f2;
        box-shadow: none !important;
        border: none;
    }
    .form-control:focus{
        background: #e2e2e2;
    }
    .form-control, .btn{        
        border-radius: 3px;
    }
    .signup-form{
       
        margin-top:200px;
        margin-left:auto;
        margin-right:auto;
        width: 390px;
        
    }
    .signup-form form{
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }    
    .signup-form .form-group{
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"]{
        margin-top: 3px;
    }
    .signup-form .row div:first-child{
        padding-right: 10px;
    }
    .signup-form .row div:last-child{
        padding-left: 10px;
    }
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
        background: #3598dc;
        border: none;
        min-width: 140px;
    }
    .signup-form .btn:hover, .signup-form .btn:focus{
        background: #2389cd !important;
        outline: none;
    }
    .signup-form a{
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover{
        text-decoration: none;
    }
    .signup-form form a{
        color: #3598dc;
        text-decoration: none;
    }   
    .signup-form form a:hover{
        text-decoration: underline;
    }
    .signup-form .hint-text {
        padding-bottom: 15px;
        text-align: center;
    }
   
</style>
</head>




    <script>
     function showerr()
        {
            document.getElementById("time").style.visibility="visible";

        }
        setTimeout("showerr()",0);

        function hideerr()
        {
            document.getElementById("time").style.visibility="hidden";

        }
        setTimeout("hideerr()",3000);
        

</script>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Eat&Eat<span></span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="managerreg.php" class="nav-link">Agency Register</a></li>
					<li class="nav-item"><a href="userreg.php" class="nav-link">Register</a></li>
					<li class="nav-item"><a href="loginnew.php" class="nav-link">Login</a></li>
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
<div class="signup-form">
    <form action="loginnew.php" method="post"  name="rentform" >
        <h2>Login</h2>
        <p></p>
        <body>

        <?php 
    if($managererr) {
    
        echo ' <div class="alert alert-warning 
            alert-dismissible fade show" role="alert" id="time">
    
            <strong>Error!</strong> '.$managererr.'
             
            
        </div> '; 
    }
    if($managerreject) {
    
        echo ' <div class="alert alert-warning 
            alert-dismissible fade show" role="alert" id="time">
    
            <strong>Error!</strong> '.$managerreject.'
             
            
        </div> '; 
    }
    if($error) {
    
        echo ' <div class="alert alert-warning 
        alert-dismissible fade show" role="alert" id="time">

        <strong>Error!</strong> '.$error.'
         
        
    </div> '; 
    }
   
         ?>
        <hr>
        
       
        <div class="form-group">
            <input type="text"  style="border:1px solid blue" class="form-control" name="username" placeholder="Enter Username"  required="required">
            
        </div>
        <div class="form-group">
            <input type="password"  style="border:1px solid blue" class="form-control" name="password" placeholder="Enter Password"  required="required">
            
        </div>
              
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit"  >sign Up</button>
        </div>
    </form>
    <div>
     <div class="hint-text">Forgot Password? <a href="forgotpass.php">Click here</a></div> 
     
    
</div>
</div>
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>