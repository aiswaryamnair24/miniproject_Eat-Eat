<?php
include "dbconnect.php";
$message=false;
$token=false;
$useremail=false;
if(!isset($_GET['token']))
{
  session_destroy();
  header('location:index.php');
}
 
if(isset($_GET['token']) && isset($_GET['useremail'])) {
  
    $token=$_GET['token'];
    $useremail=$_GET['useremail'];
   // $pass=$_POST["password"];
   $check=mysqli_query($conn,"SELECT * FROM tbl_registration WHERE useremail='$useremail' and token='$token'");

   if (mysqli_num_rows($check)!=1) {
     alert("This url is invalid or already been used. Please verify and try again.");
     exit;
   }

$_SESSION['mail']=$useremail;
$_SESSION['token']=$token;

//$q3="UPDATE `b` SET `password`='$pass' WHERE `username`='$count'";
//$res3=mysqli_query($conn,$q3);
}
// else{
//   session_destroy();
//   header('location:index.php');
// }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password1=mysqli_real_escape_string($conn,$_POST['password']);
    $password2=mysqli_real_escape_string($conn,$_POST['cpassword']);
    if ($password2==$password1) {
      $lol=$_SESSION['mail'];
      $tok=$_SESSION['token'];
      
        
       // mysqli_query($conn,"DELETE  from b where token='$tok'");
      
        mysqli_query($conn,"UPDATE tbl_registration set password='$password1' where useremail='$lol'");
        $q="select username as c from b  where useremail = '$lol'";

        $result = mysqli_query($conn,$q);
        //echo $result;
        $row = mysqli_fetch_array($result);
        $count = $row['c'];
        mysqli_query($conn,"UPDATE tbl_login set password='$password1' where username='$count'");
        header('location:loginnew.php');
    }
    else{
        $message="Verify your password";
    }
       
          
           
         
        
        
        
}
else{
  //  echo "error";
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
    body {
        color: #fff;
        background: #3598dc;
        font-family: 'Roboto', sans-serif;
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
        width: 390px;
        margin: 30px auto;
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
<div class="signup-form">
    <form action="resetpass.php" method="post"  name="rentform" >
        <h2>User</h2>
        <p>Please fill in this form to create an account!</p>
        <body>

        <?php 
    if($message) {
    
        echo ' <div class="alert alert-warning 
            alert-dismissible fade show" role="alert" id="time">
    
            <strong>Error!</strong> '.$message.'
             
            
        </div> '; 
    }
  
   
         ?>
        <hr>
        <?php
         $lol=$_SESSION['mail'];
        ?>
       
        <div class="form-group">
            <input type="text" class="form-control"  placeholder=""  value="<?php echo"$lol";?>"  required="required" disabled>
            
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Enter Password"  required="required">
            
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"  required="required">
            
        </div>
              
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit"  >sign Up</button>
        </div>
    </form>
    <div>
     <div class="hint-text">Forgot Password? <a href="forgotpass.php">Click here</a></div> 
     <div class="hint-text"><a href="a.php"><br>Home</a></div> 
    
</div>
</div>
</body>
</html>