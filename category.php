<?php
require("dbconnect.php");

//include("header.php");
//include("sidebar.php");
if(isset($_POST['submit']))
{
  
$cat_name=$_POST['cat_name'];
$check_cname = mysqli_query($conn, "SELECT cat_name FROM `tbl_category` where cat_name = '$cat_name' ");

$sqlInsert="INSERT INTO `tbl_category`(`cat_name`) VALUES('$cat_name')";
$queryInsert=mysqli_query($conn,$sqlInsert);
if($queryInsert)
{
  echo "<script>alert('Data inserted Successfully!!');window.location='viewcategory.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4>
                  <p class="card-description">
                   ADD FOOD
                  </p>
                  <form class="forms-sample"method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                      <input type="text" class="form-control"name="cat_name" id="cat_name" required placeholder="Name"onchange="Validstr();"/>
                    </div>
                    <span id="msg1" style="color:red;"></span>
                        <script>
                    function Validstr() 
                    {
                    var val = document.getElementById('cat_name').value;
                     if (!val.match(/^[a-zA-Z ]*$/)) 
                     {
                     document.getElementById('msg1').innerHTML="Only alphabets are allowed ";
                       document.getElementById('cat_name').value = "";
                        return false;
                    }
                    document.getElementById('msg1').innerHTML=" ";
                   return true;
                    }
                   </script>
                   
                    
                   
                     

                  
          
                      
              <button type="submit" name="submit"class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
</div>
                  </form>
               
              </div>
            </div>
            
            </div>
            
            
                  </form>
                </div>
              </div>
            </div>
           
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
             
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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