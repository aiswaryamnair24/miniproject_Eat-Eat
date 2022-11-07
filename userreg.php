
<?php
  use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
include "dbconnect.php";
$emailerror=false;
$usrerr=false;
$showAlert = false; 
$showError = false; 
$exists=false;


    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
      
    
    $username = $_POST["username"]; 
    $useremail=$_POST["useremail"];
    $phone = $_POST["phone"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
            
    
   // Password Hashing is used here. 
   $s = "SELECT * FROM tbl_registration WHERE useremail='$useremail'";
   $res = mysqli_query($conn, $s);
   $nu=mysqli_num_rows($res);

   $p = "SELECT * FROM tbl_login WHERE username='$username'";
   $p2 = mysqli_query($conn, $p);
   $p3=mysqli_num_rows($p2);
   $token=rand(100, 550000);
   
   
 
  
 
   if($nu==0)
   {
        if($p3==0)
        
         {
    
            $_SESSION['uname']= $username;
            $_SESSION['useremail']= $useremail;
            $_SESSION['phone']= $phone;
            $_SESSION['password']= $password;
            $tokdel = "DELETE from temp";
            $ptl = mysqli_query($conn, $tokdel);
            $po = "INSERT INTO `temp`(`email`, `token`) VALUES ('$useremail','$token')";
            $p2o = mysqli_query($conn, $po);
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
            $mail->addAddress($useremail);     //Add a recipient
           //
        
            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Hi '.$username.' This is your computer generated token';
            $mail->Body    = '<h1> '.$token.'<h1> <br> <strong>Copy this token</strong>';
           // $mail->AltBody = 'copy this token ';
        
            $mail->send();
                $_SESSION['mailsend']="Check Your mail";
                header('location:validateemail.php');
            }
        
        
    
    else{
      $usrerr=true;
    }
    
  }         
    else
    {
     $emailerror =true;  
    }
   
 //  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Eat&Eat<span></span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="managerreg.php" class="nav-link">Agency Register</a></li>
					<!-- <li class="nav-item"><a href="userreg.php" class="nav-link">Register</a></li> -->
					<li class="nav-item"><a href="loginnew.php" class="nav-link">Login</a></li>
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</nav>

<script>
                  
                  function Validate() 
                  {
                  var val = document.getElementById('name').value;
                 
                  if(val.length<3||val.length>10){
                    document.getElementById('msg1').innerHTML="Between 3 to 10 characters";
                          document.getElementById('name').value = val;


                      document.getElementById('name').style.color = "red";
                            return false;
                            
                  }
                  if (val.match(/^[A-Za-z]*$/)) 
                  {

                    
                    document.getElementById('msg1').innerHTML=" ";
                    document.getElementById('name').style.color = "green";
                    
                           
                  }
                  else{

                    document.getElementById('msg1').innerHTML="SOnly alphabets are allowed";
                          document.getElementById('name').value = val;
                          document.getElementById('name').style.color = "red";
                         // document.getElementById('contact_section input').style.border = "red";
                            return false;
                   //return true;
                  }
                }
                  
                  function ValidateEmail()
                  {
               
                    var email=document.getElementById('email').value;  
                    //var mailformat =/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/
                  // var atposition=email.indexOf("@");  
                  // var dotposition=email.indexof(".");  
                 
                    // if(email.length<3||email.length>20){
                    //   document.getElementById('emailer').innerHTML="Invalid Email";
                    //       document.getElementById('email').value = email;
                    //       document.getElementById('email').style.color = "red";
                    //      // alert("err");
                    //         return false;
                    // }
                   if(email.match(/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/)){  
                    document.getElementById('emailer').innerHTML=" ";
                    document.getElementById('email').style.color = "green";
                    }
                    else{
                    
                    document.getElementById('emailer').innerHTML="Please enter a valid Email";  
                      document.getElementById('email').value = email;
                          document.getElementById('email').style.color = "red";
                    return false;  
                   //return true;

                    }}
                    
                    function Validatephone()
                    {
                        var ph = document.getElementById("phone").value;
                        var expr = /^[6-9]\d{9}$/;
                        if(ph.match(/^[6-9]\d{9}$/)){
              
                            document.getElementById('phoner').innerHTML="";  
                      document.getElementById('phone').value = pass;
                          document.getElementById('phone').style.color = "green";
                        }
                      
                        
                        else{
                            document.getElementById('phoner').innerHTML="Invalid Mobile number";  
                      document.getElementById('phone').value = pass;
                          document.getElementById('phone').style.color = "red";
                          return false;
                        }
                    }
                  
                    
function Validatepassword()
                   {
                
                    var pass=document.getElementById('password').value;
                    var patt = /^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{7,15}$/;

                                              if(!pass.match(patt)){
                                                  console.log(pass);
                                                  document.getElementById('passworder').innerHTML="Password must be 7 to 15 character with number and special character ";  
                                                  document.getElementById('password').value = pass;
                                                      document.getElementById('password').style.color = "red";
                                              return false;  
                                              }else{
                                                  console.log(pass, "Green");
                                              document.getElementById('passworder').innerHTML=" ";
                                              document.getElementById('password').style.color = "green";
                                              //return true;
                                              }
                }
                function Confirmpass()
                   {
                
                    var pass1=document.getElementById('password').value;
                    var pass2=document.getElementById('cpassword').value;
                     if (pass1!=pass2)
                              {
                      document.getElementById('cpassworder').innerHTML="Password doesnt match ";  
                      document.getElementById('cpassword').value = pass;
                          document.getElementById('cpassword').style.color = "red";
                    return false;  
                    }
                 
                    else{
                    document.getElementById('cpassworder').innerHTML=" ";
                    document.getElementById('cpassword').style.color = "green";
                  // return true;s
                    
                  }
                }
                  function Val()
                  {
                    if(Validate()===false || ValidateEmail()===false || Validatepassword()===false || Confirmpass()===false)
                    {
                      return false;
                    }
                  }

                  
             </script>   

             
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
<?php     
            
        


            if($usrerr) {
              
              echo  '<div class="w-100 "><div class="alert alert-danger 
              "role="alert" id="time"> 
            <strong>Error!</strong> username exist </div></div>'; 
  
              }
                  
              if($emailerror) {
              
                echo ' <div class="w-100 "><div class="alert alert-danger 
                  alert-dismissible fade show" role="alert" id="time"> 
                <strong>Error!</strong> Email Already exist </div>
                
    
    
                </div> '; 
    
                }
              
            if($exists) {
              
            echo ' <div class="w-100 "><div class="alert alert-danger 
              alert-dismissible fade show" role="alert" id="time""> 
            <strong>Error!</strong>  </div>


            </div> '; 

            }
   ?>           
    <form action="userreg.php" method="post"  name="rentform" onsubmit="return Val()">
        <h2>User</h2>
        <p>Please fill in this form to create an account!</p>
           
        <hr>

        <div class="form-group">
            <input type="text"  style="border:1px solid blue" class="form-control" name="username" id="name" placeholder="Name" onblur="return Validate()" required="required">
            <span id="msg1" style="color:red"></span> 
        </div> 
        <div class="form-group">
            <input type="email"  style="border:1px solid blue" class="form-control" name="useremail" id="email" placeholder="email" onblur="return ValidateEmail()" required="required">
            <span id="emailer" style="color:red"></span> 
        </div> 
        <div class="form-group">
            <input type="phone"  style="border:1px solid blue" class="form-control" name="phone" id="phone" placeholder="phone" onchange="return Validatephone()" required minlength="10" maxlength="10" required pattern="[0-9]+">
            <span id="phoner" style="color:red"></span> 
        </div>  
        <div class="form-group">
            <input type="password"  style="border:1px solid blue" class="form-control" name="password" id="password" placeholder="Password"  onchange="return  Validatepassword()" required="required">
            <span id="passworder" style="color:red"></span> 
        </div>
        <div class="form-group">
            <input type="password"  style="border:1px solid blue" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onchange="return  Confirmpass()" required="required">
            <span id="cpassworder" style="color:red"></span> 
        </div>
              
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit" >sign Up</button>
        </div>
    </form>
    <div>
     <div class="hint-text">Already have an account? <a href="index.php">Login here</a></div> 
     <div class="hint-text">Agent registration<a href="a.php"><br>click here</a></div> 
    
</div>
</div>
</body>
</html>