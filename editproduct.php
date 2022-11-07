         ?php 
        include "dbconnect.php";

        if(isset($_GET["p_id"]))
        {
	    $pid=$_GET["p_id"];
	    $sql=mysqli_query($conn,"SELECT * FROM tbl_products  WHERE p_id='$pid'");
	    $display=mysqli_fetch_array($sql);
        }
        ?>
                        <header class="panel-heading">
                            Edit Product
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $display['p_name'];?>" placeholder="Enter Name">
                                    </div>
                                
                                    <div class="form-group">
                            <?php



$sql=mysqli_query($conn,"select * from tbl_cat "); 
?>
<label>Category Name</label><br>

     
<select   name="cat_id" id="category" onchange="showResult(this.value)" class="form-control m-bot15" required >
<option value="">--select--</option>
<?php
while($row=mysqli_fetch_array($sql))
{

?>
<option value="<?php echo $row[0] ?>" ><?php echo $row[1] ?></option>
<?php
	
}
?>

</select></div>
<div class="form-group">
<?php

$conn=mysqli_connect("localhost","root","","caters");

$sql=mysqli_query($conn,"select * from tbl_subcategory"); 
?>
<label>Subcategory Name</label><br>

     
<select   name="sid" id="tbl_subcategory" onchange="showResult(this.value)" class="form-control m-bot15" required >
<option value="">--select--</option>
<?php
while($row=mysqli_fetch_array($sql))
{

?>
<option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?></option>
<?php
	
}
?>

</select></div>                       <div class="form-group">
                                        <label for="des">Product Description</label>
                                        <input type="text" class="form-control" name="des" value="<?php echo $display['descp'];?>"  id="des">
                                    </div>
                                      <div class="form-group">           
                                        <label for="image">Plant image</label>
                                        <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="photo" id="image">
                                        <input type="hidden" class="form-control"  name="old" value="<?php echo $display['image'];?>" >
                                    </div>
                                   
                                    <div class="panel-body">

                                   <div class="row">
                                     
                                    <div class="col-md-4 form-group">
                                    <label for="qua">Plant Quantity</label>
                                <input type="number"  class="form-control" value="<?php echo $display['quantity'];?>"  name="quantity">
                                
                            </div>
                            
                           
                                
                                
                            </div>
                            <div class="col-md-4 form-group">
                                    <label for="price">Price</label>
                                <input type="text"  class="form-control" value="<?php echo $display['price'];?>"  name="price">
                                
                            </div>
                            
</div>
</div>
                                <button type="submit" name="btnsubmit"class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-12">
               
            </div>
        </div>
        <div class="row">
            
        </div>
        <?php


if(isset($_POST["btnsubmit"]))
{

    $Name=$_POST['name'];
    
    $sid=$_POST['sub_id'];
    $des=$_POST['des'];
    $photo=$_FILES["photo"]["name"];
    $old=$_POST['old'];
    $Q=$_POST['quantity'];
    
    $price=$_POST['price'];
  
    move_uploaded_file($_FILES["photo"]["tmp_name"],"image/".$_FILES["photo"]["name"]);
    
    $sql=mysqli_query($conn,"UPDATE tbl_product SET sub_id='$sub_id',p_name='$Name',descp='$des',image='$photo',quantity='$Q',price='$price' WHERE p_id='$p_id'");
	if($sql)
	{
		
		$_SESSION['vstatus'] = "Updated Successfully";
  
        echo "<script>;window.location='viewplant.php'</script>";
        unlink("image/".$old);
	}
}
?>
        
 <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
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
     $("#sub_category").html(dataResult);
    }
   });
  
  
 });
});</script>
</body>
</html>