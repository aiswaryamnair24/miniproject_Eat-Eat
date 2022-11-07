<?php 
include "dbconnect.php";
//include "header.php";
//include "sidebar.php";
    if (isset($_POST['update'])) {

        $cat_name = $_POST['cat_name'];

        $cat_id = $_POST['cat_id'];

       

        $sql = "UPDATE `tbl_category` SET `cat_name`='$cat_name' WHERE `cat_id`='$cat_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

           	echo('<script>alert("category updated successfully")</script>');
	echo('<script>window.location.assign("viewcat.php");</script>');

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['cat_id'])) {

    $cat_id = $_GET['cat_id']; 

    $sql = "SELECT * FROM `tbl_category` WHERE `cat_id`='$cat_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $cat_name = $row['cat_name'];

            

            $cat_id = $row['cat_id'];

        } 

    ?>

<html>
<head>
<title>Updation form</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<body>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Update Category</h4>
                  

	<form action="" method="POST">
	
	<input type="text" name="cat_name" value="<?php echo $cat_name; ?>">
	<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
	<br><br>
    <button type="submit" name="update"value="update"class="btn btn-primary mr-2">Submit</button> 
	</form>
	</div>
	
                </div>
              </div>
            </div>
           
</body>
</head>
</html>

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 