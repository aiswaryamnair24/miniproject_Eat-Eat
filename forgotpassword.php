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
    $s = "SELECT * FROM tbl_registration WHERE useremail='$useremail'";
    $res = mysqli_query($conn, $s);
    $nu=mysqli_num_rows($res);
  

    if($nu==0)
    {
        $noemail="Invalid Email";
        //header('location:forgotpassword.php');
    }
    else{
      $name="select username as c from tbl_registration where useremail='$useremail'";
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
        $mail->Username   = 'ankithjbiji2023a@mca.ajce.in';                     //SMTP username
        $mail->Password   = 'Ankitjb@1999';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('ankithjbiji2023a@mca.ajce.in', 'Shop and Bid');
        $mail->addAddress($_POST['email']);     //Add a recipient
       //
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Hi '.$nam.' Reset Your Password';
        $mail->Body    = '<a href ="http://localhost/mini/miniproject/front/passwordreset.php?token='.$token.' & useremail='.$useremail.'">Click here to reset password</a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        $mailmsg="Please check your mail $useremail";
       // $_SESSION['mailrespo'] = $mailmsg;
        //header('location:forgotpassword.php');
    }
   

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
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
            <span>
              Shop And Bid
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
               
                <li class="nav-item">
                  <a class="nav-link" href="managerregistration.php"> Jobs </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="userregistration.php"> Resister</a>
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
   
  
  <!-- contact section -->
  <div id="login">
    <section class="contact_section layout_padding">
      <div class="container">
      <?php
    if($noemail) {
       
        echo ' <div class="w-50 "><div class="alert alert-danger 
            alert-dismissible fade show" role="alert" id="time"> 
            <strong>Error!</strong>.'.$noemail.'.
            
          </div>
    
       
     </div> '; 
     
    }
     ?>
            <?php
    if($mailmsg) {
       
      echo ' <div class="w-50 "><div class="alert alert-warning 
      alert-dismissible fade show" role="alert" id="time"> 
        '.$mailmsg.' </div>

 
 </div> '; 
     
    }
     ?>
     
         

        <h2 class="font-weight-bold">
          Forgot Password
        </h2>
        <div class="row">
          <div class="col-md-8 mr-auto">
            <form action="forgotpassword.php" method="post" >
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" name="email"placeholder="Please Enter Your Email" required>
                  </div>
                 
                  
  
                 
                  <div class="mt-5">
                    <button type="submit" name="submit">
                      submit
                    </button>
                    
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
 

  </section>
  </div>
  <!-- end contact section -->


 
  <!-- footer section -->

  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>