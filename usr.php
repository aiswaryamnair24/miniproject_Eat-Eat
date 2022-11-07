
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
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
            
    
   // Password Hashing is used here. 
   $s = "SELECT * FROM b WHERE useremail='$useremail'";
   $res = mysqli_query($conn, $s);
   $nu=mysqli_num_rows($res);

   $p = "SELECT * FROM login WHERE username='$username'";
   $p2 = mysqli_query($conn, $p);
   $p3=mysqli_num_rows($p2);
   $token=rand(100, 550000);
   
   
 
  
 
   if($nu==0)
   {
        if($p3==0)
        
         {
    
            $_SESSION['uname']= $username;
            $_SESSION['useremail']= $useremail;
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
            $mail->Username   = 'ankithjbiji2023a@mca.ajce.in';                     //SMTP username
            $mail->Password   = 'Ankitjb@1999';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('ankithjbiji2023a@mca.ajce.in', 'Shop and Bid');
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
                header('location:validatemail.php');
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
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Shop and Bid</title>
  <link rel="icon" type="image/x-icon" href="images/01.jpg">

  <!-- slider stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
 </head>

 <body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="" /><span>
              Shop & Bid
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">


 <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                      <a class="nav-link" href="login.php">Login </a>
                    </li>
                    
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a href="">
                Get A quote
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    </div>
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


  <section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Register
      </h2>

      <div class="row">
      
        <div class="col-md-8 mr-auto">
          <form action="usr.php" method="post" id="reg" onsubmit="return Val();">
           <?php     
            
        


            if($usrerr) {
              
              echo  '<div class="w-50 "><div class="alert alert-danger 
              "role="alert" id="time"> 
            <strong>Error!</strong> username exist </div></div>'; 
  
              }
                  
              if($emailerror) {
              
                echo ' <div class="w-50 "><div class="alert alert-danger 
                  alert-dismissible fade show" role="alert" id="time"> 
                <strong>Error!</strong> Email Already exist </div>
                
    
    
                </div> '; 
    
                }
              
            if($exists) {
              
            echo ' <div class="w-50 "><div class="alert alert-danger 
              alert-dismissible fade show" role="alert" id="time""> 
            <strong>Error!</strong>  </div>


            </div> '; 

            }
   ?>              
     
                 
   
            <div class="contact_form-container">
              <div>


 <div>
                  <input type="text"  name="username" id="name" placeholder="Enter Name"   onkeyup="return Validate()"/>
                  
                </div>
                <span id="msg1" style="color:red;">hi</span>

                
                
                <div>
                  <input type="text"  name="useremail" id="email" placeholder="Your Email" onkeyup="return ValidateEmail()"/>
                </div>
                <span id="emailer" style="color:red;"></span>
                <div>
                  <input type="password" class="form-input" name="password" id="password" placeholder="Password"   onkeyup="return Validatepassword() "/>
                </div>
                <span id="passworder" style="color:red;"></span>
                <div>
                  <input type="password" class="form-input" name="cpassword" id="cpassword" placeholder="Confirm Password"  onkeyup="return Confirmpass()"/>
                </div>
                <span id="cpassworder" style="color:red;"></span>

                
                <div class="mt-5">
                  <button type="submit" name="submit" >
                    Submit
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>

  
  </section>
  
    
  </body>


<script>
                  
                    function Validate() 
                    {
                    var val = document.getElementById('name').value;
                    if (!val.match(/^[a-zA-Z ]*$/)) 
                    {
                      document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                            document.getElementById('name').value = val;
                            document.getElementById('name').style.color = "red";
                           // document.getElementById('contact_section input').style.border = "red";
                              return false;
                             flag=1;
                    }
                    if(val.length<3||val.length>10){
                      document.getElementById('msg1').innerHTML="Between 3 to 10 characters";
                            document.getElementById('name').value = val;


                        document.getElementById('name').style.color = "red";
                              return false;
                              
                    }
                    else{

                    
                      document.getElementById('msg1').innerHTML=" ";
                      document.getElementById('name').style.color = "green";
                     //return true;
                    }
                  }
                    
                    function ValidateEmail()
                    {
                 
                      var email=document.getElementById('email').value;  
                      var mailformat =/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/
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
                     
                     //return true;
                     document.getElementById('emailer').innerHTML="Please enter a valid Email";  
                        document.getElementById('email').value = email;
                            document.getElementById('email').style.color = "red";
                      return false; 

                      }}
                    
                     function Validatepassword()
                     {
                  
                      var pass=document.getElementById('password').value;
                      var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                       if (pass.length<8)
                                {
                        document.getElementById('passworder').innerHTML="Atleast 8 character ";  
                        document.getElementById('password').value = pass;
                            document.getElementById('password').style.color = "red";
                      return false;  
                      }
                   
                      else{
                      document.getElementById('passworder').innerHTML=" ";
                      document.getElementById('password').style.color = "green";
                    // return true;s
                      
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
  </html>
  <!-- end contact section -->