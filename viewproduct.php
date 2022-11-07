
<?php
include "dbconnect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
</style>
<!-- CSS only -->
<!-- JavaScript Bundle with Popper -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
    <body>
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

<div class="displayproducts">
<section class="fruit_section">
<div class="container">
  <h2 class="custom_heading">Shop</h2>
  <p class="custom_heading-text">
    Shop now
  </p>


<?php
$sql="select * from tbl_product";
$run=mysqli_query($conn,$sql);
while($ru=mysqli_fetch_assoc($run)){
  $pid=$ru['id'];
  $productname=$ru['name'];
  $price=$ru['price'];
  //$stock=$ru['stock'];
  $catagory=$ru['catagory'];
  $description=$ru['desc'];
  $image=$ru['image'];



echo ' 
  <div class="row layout_padding2">
<div class="col-md-8">
      <div class="fruit_detail-box">
        <h3 id="heroname">
          '.$productname.'
        </h3>
        <p class="mt-4 mb-5">
        
           <h2>Price: <b>'.number_format($price).'</b>/-<br></h2>
         
        
        </p>
        <span id="stock" style="color:red"></span><br>
        quantity:<nav aria-label="Page navigation example" style="color:black" id="counter">
        <ul class="pagination">
          <li class="page-item"><button class="page-link" onclick="decrease()">-</button></li>
         <li class="page-item"><a class="page-link" ><span id="count">1</span></a></li>
       
        
          <li class="page-item"><button class="page-link"  onclick="increase()">+</button></li>
        </ul>

      </nav>
      Total:<h3 style="color:red"><span id="total"><script>document.write(total);</script></span></h3>
        <div>
      <a href="addtocart.php?product=echo<script>document.write(total);</script>"" class="custom_dark-btn" id="viewbtn">
        Add to Cart
      </a>
    </div>
  </div>
</div>
<div class="container" style="width: 300px">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="products/'.$image.'" class="d-block w-100" alt="...">
      
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="products/'.$image2.'" class="d-block w-100" alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="products/'.$image3.'" class="d-block w-100" alt="...">
     
    </div>
  </div>
 
</div>
</div>
</div>
</div>';
}
  ?>
  </div>
   </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->


</body>
</html>
