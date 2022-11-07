
<?php
include "dbconnect.php";
$tokenerr=false;
 
   $username= $_SESSION['uname'];
   $useremail=$_SESSION['useremail'];
   $phone=$_SESSION['phone'];
   $password=$_SESSION['password'];
   $mailmsg =$_SESSION['mailsend'];



if(isset($_POST['btn']))
{

  $tokenfrom=$_POST['tokenfrom'];
  $user= $_SESSION['useremail'];
  $tok="select token from temp where email='$user'";
  $tokres=mysqli_query($conn,$tok);
  $row=mysqli_fetch_array($tokres);
  $cnt=$row['token'];
  if($tokenfrom==$cnt)
  {

  
    $sql = "INSERT INTO tbl_registration ( username, useremail,phone,
                    password,date) VALUES ('$username','$useremail','$phone',
                    '$password', current_timestamp())";
                    $sql2 = "INSERT INTO tbl_login ( username, 
                    password,value) VALUES ('$username', 
                    '$password','2')";
           $tokdel = "DELETE from temp";
           $ptl = mysqli_query($conn, $tokdel);
                $result = mysqli_query($conn, $sql);
                $result2 = mysqli_query($conn, $sql2);
                if($result)
                {
                    header('location:loginnew.php');
                }

  }
  else{
    $tokenerr=true;
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
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
<body>




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
    <form action="validateemail.php" method="post"  name="rentform" >
        <h2>Token Verification</h2>
        <p></p>
        <?php
        if($tokenerr) {
              
              echo  '<div class="w-50 "><div class="alert alert-danger 
              "role="alert" id="time"> 
            <strong>Error!</strong> Invalid Token </div></div>'; 
  
              }
              ?>
        <hr>
        
       
        <div class="form-group">
            <input type="text" class="form-control" name="tokenfrom" placeholder="Enter Code"  required="required">
            
        </div>
              
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="btn"  >sign Up</button>
        </div>
    </form>
    <div>
     <div class="hint-text"><a href="index.html">home</a></div> 
     <!-- <div class="hint-text">Agent registration<a href="a.php"><br>click here</a></div>  -->
    
</div>
</div>
</body>
</html>