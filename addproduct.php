			
			
<?php
include "dbconnect.php";
$update=false;
$error=false;

// Check user login or not
// if(!isset($_SESSION['uname'])){
//     header('Location: login.php');
// }

// // logout
// if(isset($_POST['but_logout'])){
//     session_destroy();
//     header('Location: index.php');
// }

// $n=$_SESSION['uname'];
// $q="select count(*) as c from login  where value = 0 ";

// $result = mysqli_query($conn,$q);
// //echo $result;
// $row = mysqli_fetch_array($result);
// $count = $row['c'];
// $qur="select count(*) as c2 from b";

// $result2 = mysqli_query($conn,$qur);
// //echo $result;
// $row4 = mysqli_fetch_array($result2);
// $countuser = $row4['c2'];

if(isset($_POST['submit']))
{
$catagoryid=$_POST['catagoryid'];
$subid=$_POST['subid'];
$pname=$_POST['pname'];
$price=$_POST['price'];

$description=$_POST['desc'];
$img_name=$_FILES['image']['name'];

$target_dir="image/";
$target_file=$target_dir.basename($_FILES['image']['name']);

$img_type=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$extension_array=array("jpg","jpeg","png");
if(in_array($img_type,$extension_array)){
	
	//$img_bases64= base64_encode(file_get_contents($_FILES['image']['tmp_name']));
	//$image='data:image/'.$img_type.';base64,'.$img_bases64;
  $sql2 = "INSERT INTO `tbl_product`(`catagoryid`, `subid`, `name`, `price`, `desc`,`image`,`date`) VALUES ('$catagoryid','$subid','$pname','$price','$description','$img_name',current_timestamp())";
	move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$img_name);

  $run=mysqli_query($conn,$sql2);
  
}
else{
  $error=true;
}
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  

  <title>Shop and Bid</title>
  <link rel="icon" type="image/x-icon" href="images/01.jpg">

  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <!-- <style>
  .header_section{
    background-color: 	#393D47;
    color:#fff;

  }
  .nav-link {
    color:white;
  }
  #shop{
    color:#E2DFD2;
  }
  #shop:hover{
    color:#fff;
  }
</style> -->
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style2.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="color:black">
  <a class="navbar-brand" href="#">Eat & Eat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          District
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Trivananthapuram</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">District</a>
      </li> -->
    </ul>

  </div>
</nav>


      
   
    <div class="container">
  
  <section class="panel panel-default">
<div class="panel-heading m-5"> 

  <?php
    if($error)
    {
      echo ' <div class="w-50 "><div class="alert alert-danger 
        alert-dismissible fade show" role="alert" id="time"> 
    <strong>Error!</strong> Invalid Image format </div>

   
 </div> '; 
      
    
    }
    ?>
  
<h3 class="panel-title">Add products</h3> 
</div> 
<div class="panel-body">
  
<form action="addproduct.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

<div class="form-group  w-50">
<label for="sel1">Category</label>
		  <select class="form-control" id="category" name="catagoryid" required>
		  <option value="">Select Category</option>
		    <?php
        $result = mysqli_query($conn,"SELECT * FROM tbl_category");
			while($row = mysqli_fetch_array($result)) {
			?>
				<option value="<?php echo $row["cat_id"];?>"><?php echo $row["cat_name"];?></option>
			<?php
			}
			?>
			
		  </select>
    </div><!-- form-group // -->
    <div class="form-group  w-50">
		  <label for="sel1">Sub Category</label>
		  <select class="form-control" id="subcategory" name="subid" required>
			
		  </select>
		</div>
   <div class="form-group  w-50">
    <label for="name" class="col-sm-3 control-label">Product Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="pname" id="name" placeholder="Enter Product Name">
    </div>
  </div> <!-- form-group // -->
  <div class="form-group  w-50">
    <label for="name" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="Number" class="form-control" name="price" id="name" placeholder="Price">
    </div>
  </div> <!-- form-group // -->
  <div class="form-group  w-50">
    <label for="about" class="col-sm-3 control-label" >Description</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="desc"></textarea>
    </div>
  </div> <!-- form-group // -->
  <!-- form-group // -->
   <!-- form-group // -->
  <div class="form-group  w-50">
    
    <div class="col-sm-3">
      <label class="control-label small" for="file_img">Cover image (jpg/png):</label> <input type="file" name="image">
    </div>
	
   
  </div>

   <!-- form-group // -->
  
  </div> <!-- form-group // -->
  <hr>
  <div class="form-group  w-50">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </div> <!-- form-group // -->
</form>
  
</div><!-- panel-body // -->
</section><!-- panel// -->

  
</div> <!-- container// -->
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
           <script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script>
  $(document).ready(function() {
	$('#category').on('change', function() {
			var category_id = this.value;
			$.ajax({
				url: "sql.php",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(dataResult){
          //alert(dataResult);
					$("#subcategory").html(dataResult);
				}
			});
		
		
	});
});
</script>
    </body>
  </head>
</html>
