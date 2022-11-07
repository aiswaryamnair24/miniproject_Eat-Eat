
<?php
    
    $showAlert = false; 
    $showError = false; 
    $exists=false;
    $emailerror=false;
        
    if($_SERVER["REQUEST_METHOD"] == "POST") {
          
        // Include file which makes the
        // Database Connection.
        include 'dbconnect.php';   
        
        $username = $_POST["username"]; 
        $useremail=$_POST["useremail"];
        $password = $_POST["password"]; 
        $cpassword = $_POST["cpassword"];
                
        
       // Password Hashing is used here. 
       $s = "SELECT * FROM b WHERE useremail='$useremail'";
       $res = mysqli_query($conn, $s);
       $nu=mysqli_num_rows($res);
       if($nu==0)
       {
       
            if(($password == $cpassword) && $exists==false) {
        
                $sql = "INSERT INTO `b` ( `username`, `useremail`,
                    `password`, `cpassword`,`date`) VALUES ('$username','$useremail', 
                    '$password','$cpassword', current_timestamp())";
                    $sql2 = "INSERT INTO `login` ( `username`, 
                    `password`,`value`) VALUES ('$username', 
                    '$password','1')";
        
                $result = mysqli_query($conn, $sql);
                $result2 = mysqli_query($conn, $sql2);
                
        
                if ($result) {
                    $showAlert = true; 
                }
            } 
            else { 
                $showError = "Passwords do not match"; 
            }    
            
        } 
        
                  
        else
        {
         $emailerror = "Sorry... email already taken";  
        }
       
     //  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
    }
    
        
    ?>
    
    
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up Form by Colorlib</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Font Icon -->
        <link rel="stylesheet" href="reg/fonts/material-icon/css/material-design-iconic-font.min.css">
    
        <!-- Main css -->
        <link rel="stylesheet" href="reg/css/style.css">
    </head>
    <!-- username -->
    
    
    
    
    <body>
    
    
    
    
        <div class="main">
    
            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form action="registration.php" method="POST" id="signup-form" class="signup-form" onsubmit="return Val();">
           <?php
    
    
        
        if($showAlert) {
        
            echo ' <div class="alert alert-success 
                alert-dismissible fade show" role="alert">
        
                <strong>Success!</strong> Your account is 
                now created and you can login. 
                
            </div> '; 
        }
        
        if($showError) {
        
            echo ' <div class="alert alert-danger 
                alert-dismissible fade show" role="alert"> 
            <strong>Error!</strong> '. $showError.'
        
           
         </div> '; 
        }
         
        if($emailerror) {
            echo ' <div class="alert alert-danger 
                alert-dismissible fade show" role="alert">
        
            <strong>Error! Email Already Exist</strong> '. $emailerror.'
            
           </div> '; 
         }
           
        
       
            
        if($exists) {
            echo ' <div class="alert alert-danger 
                alert-dismissible fade show" role="alert">
        
            <strong>Error!</strong> 
            
           </div> '; 
         }
             
       
       
             ?>
                            <h2 class="form-title">Create account</h2>
                            <div class="form-group">
                                <input type="text" class="form-input" name="username" id="name" placeholder="Enter Name"  required onkeyup="return Validate()"/>
                            </div>
                            <span id="msg1" style="color:red;"></span>
                            <div class="form-group">
                                <input type="email" class="form-input" name="useremail" id="email" placeholder="Your Email" required onkeyup="return ValidateEmail()"/>
                            </div>
                            <span id="emailer" style="color:red;"></span>
                            <div class="form-group">
                                <input type="password" class="form-input" name="password" id="password" placeholder="Password"  required onkeyup="return Validatepassword()"/>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <span id="passworder" style="color:red;"></span>
                            <div class="form-group">
                                <input type="password" class="form-input" name="cpassword" id="cpassword" placeholder="Repeat your password" required onkeyup="return Confirmpass()"/>
                                <span toggle="#cpassword" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            <span id="cpassworder" style="color:red;"></span>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                            </div>
                        </form>
                        <p class="loginhere">
                            Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>  
                        </p>
                       
                            <div   style="margin-left:88px">Looking for a job? <a href="manager.php" class="loginhere-link">Register here</a>  </div>
                            <div   style="margin-left:88px"><a href="home.php" class="loginhere-link">Home</a>  </div>
                       
                    </div>
                </div>
            </section>
    
        </div>
    
        <!-- JS -->
        <script src="reg/vendor/jquery/jquery.min.js"></script>
        <script src="reg/js/main.js"></script>
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
                              var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            //var atposition=x.indexOf("@");  
                            //var dotposition=x.lastIndexOf(".");  
                           
                              if(email.length<3||email.length>20){
                                document.getElementById('emailer').innerHTML="Invalid Email";
                                    document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                                   // alert("err");
                                      return false;
                              }
                             if(!email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){  
                                document.getElementById('emailer').innerHTML="Please enter a valid Email";  
                                document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                              return false;  
                              }
                              else{
                              document.getElementById('emailer').innerHTML=" ";
                              document.getElementById('email').style.color = "green";
                             //return true;
    
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
                              if(Validate()===false || ValidateEmail()===false || Validatepassword()===false || Confirmpass()===flase)
                              {
                                return false;
                              }
                            }
    
                            
                       
    </script>
    
    <!-- This templates was made by Colorlib (https://colorlib.com) -->
    </html>
