
<?php

$mailmsg=false;
$noemail=false;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include "dbconnect.php";

if(isset($_POST['submit'])){

    $useremail=$_POST['email'];
    $s = "SELECT * FROM b WHERE useremail='$useremail'";
    $res = mysqli_query($conn, $s);
    $nu=mysqli_num_rows($res);
  

    if($nu==0)
    {
        $noemail="Invalid Email";
        //header('location:forgotpassword.php');
    }
    else{
      $name="select username as c from tbl_login where useremail='$useremail'";
      $namef=mysqli_query($conn,$name);
      $row = mysqli_fetch_array($namef);
        $nam = $row['c'];
        $token=rand(100, 550000);
        $que="UPDATE `b` SET `token` = '$token' WHERE `useremail` = '$useremail'";
        $res2=mysqli_query($conn,$que);
        $mail = new PHPMailer(true);

        
        //Server settings
       // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aiswaryamnair2023a@mca.ajce.in';                     //SMTP username
        $mail->Password   = 'aiswaryaamma';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('aiswaryamnair2023a@mca.ajce.in', 'Edapavoor Caters');
        $mail->addAddress($_POST['email']);     //Add a recipient
       //
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Hi '.$nam.' Reset Your Password';
        $mail->Body    = '<a href ="http://localhost/myproject/resetpass.php?token='.$token.' & useremail='.$useremail.'">Click here to reset password</a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        $mailmsg="Please check your mail $useremail";
       // $_SESSION['mailrespo'] = $mailmsg;
        //header('location:forgotpassword.php');
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
    <form action="forgotpass.php" method="post"  name="rentform" >
        <h2>User</h2>
        <p>Please fill in this form to create an account!</p>
        <body>

        <?php 
    if($noemail) {
    
        echo ' <div class="alert alert-warning 
            alert-dismissible fade show" role="alert" id="time">
    
            <strong>Error!</strong>Email Doesnt Exist In database
             
            
        </div> '; 
    }
    if($mailmsg) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert" id="time">
    
            <strong>Error!</strong>'.$mailmsg.'
             
            
        </div> '; 
    }
  
   
         ?>
        <hr>
        
       
       
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Enter Email"  required="required">
            
        </div>
              
       
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit"  >sign Up</button>
        </div>
    </form>
    <div>
     <div class="hint-text">Forgot Password? <a href="index.php">Click here</a></div> 
     <div class="hint-text"><a href="a.php"><br>Home</a></div> 
    
</div>
</div>
</body>
</html>