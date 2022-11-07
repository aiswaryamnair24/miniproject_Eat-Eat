<?php
include "dbconnect.php";
//include ("header.php");
//include ("sidebar.php");

?>
<!DOCTYPE html>
<html lang="en">

    <body>

    <div class="main-panel">        
         <p class="card-description">
                 Food</p>
    <a href="basic_elements.php">Add </a>
  
  <!--Table-->
  <table class="table">

    <!--Table head-->
    <thead>
          <tr>
            <th data-breakpoints="xs">SLNO</th>
            <th>category</th>
            <th>Subcategory</th>
         
            
            <th style="color:#F00">Edit</th>
    <th style="color:#F00">Delete</th>
            
          </tr>
        </thead>
        <tbody>
          <tr data-expanded="true">
         
<?php
$s=1;
$sql=mysqli_query($conn,"SELECT p.*,s.cat_name as cname  FROM tbl_subcategory p inner join tbl_category s on s.cat_id=p.cat_id");

while($display=mysqli_fetch_array($sql))
{
 echo "<tr>";
 echo"<td>".$s++."</td>";
 echo "<td>".$display["cname"]."</td>";
 echo "<td>".$display["sub_name"]."</td>";
   
    
    
	echo "<td><a style='color:#090' href='editsubcat.php?s_id=".$display['sub_id']."'>Edit</a> </td>";
	echo "<td><a style='color:#090' href='deletesubcat.php?s_id=".$display['sub_id']."'>Delete</a> </td>";
	
	echo "</tr>";
	
  }

echo "</table>";

?>

        </tbody>
      </table>
    </div>
  </div>
</div>

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
