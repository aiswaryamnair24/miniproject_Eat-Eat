<?php
	include 'dbconnect.php';
	$category_id=$_POST["category_id"];
	$result = mysqli_query($conn,"SELECT * FROM tbl_subcategory where cat_id=$category_id");
?>
<option value="">Select SubCategory</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
	<option value="<?php echo $row["sub_id"];?>"><?php echo $row["sub_name"];?></option>
<?php
}
?>