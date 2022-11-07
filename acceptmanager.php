<?php
include "dbconnect.php";




if(isset($_GET['accept']))
{
$ws_name=$_GET['accept'];

//$sql="UPDATE `login` SET `value`='1' WHERE username = '$mname' ";
$sql2="UPDATE `tbl_login` SET `value`='2' WHERE username = '$ws_name' ";
$sql3="UPDATE `tbl_agency` SET `value`='2' WHERE mname = '$ws_name' ";
//$res=mysqli_query($conn,$sql);

$res2=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql3);
if($res2)
{
    header('location:managerview.php');
}
else
{
    die(mysqli_error($conn));
}
}

if(isset($_GET['reject']))
{
$ws_name=$_GET['reject'];

//$sql="UPDATE `login` SET `value`='1' WHERE username = '$mname' ";
$sql2="UPDATE `tbl_login` SET `value`='5' WHERE username = '$ws_name' ";
$sql3="UPDATE `tbl_agency` SET `value`='5' WHERE mname = '$ws_name' ";
//$res=mysqli_query($conn,$sql);

$res2=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql3);
if($res2)
{
    header('location:managerview.php');
}
else
{
    die(mysqli_error($conn));
}
}


?>