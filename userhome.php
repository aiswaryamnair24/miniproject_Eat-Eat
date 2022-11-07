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
    <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
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
        echo "<h1>welcome,$n </h1>";
        ?>
        <form method='post' action="">
        
        <button type="submit"  class="btn btn-outline-dark" name="but_logout">Logout</button>
        </form>
        </div>
        </div>
            
        </body>
     </html>
