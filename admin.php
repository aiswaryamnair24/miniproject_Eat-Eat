

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
        
         <a class="btn btn-dark" role="button" href="managerview.php">
    notifications <span class="badge bg-secondary"><?php echo "$count"; ?></span>
         </a>
         <a class="btn btn-dark" role="button" href="userview.php">
    usersview
         </a>
        
       </div>
         <!-- accept manager -->
         
          <!-- <script>
            var coum=; -->
            <!-- if(coum==0){
              var xy=document.getElementById("sample3");
            
              xy.style.display="none";
             
            }
          </script>
          <div id="sample3">hello</div> -->

          <script>
            function hide() {
              var x=document.getElementById("sample");
              var y=document.getElementById("sample2");
              if(x.style.display==="none"){
                x.style.display="block";
                y.style.display="none";
              }
              else{
                x.style.display="none";
              }
            }
            function hide2() {
              var x=document.getElementById("sample");
              var y=document.getElementById("sample2");
              if(y.style.display==="none"){
                y.style.display="block";
                x.style.display="none";
              }
              else{
                y.style.display="none";
              }
            }
          </script>


  

 
  </div>
  </div>



  <div id="sample2">
  
         

         <!-- <h4 ><strong>Users</strong></h4> -->

  
</div>
    </body>
</html>


