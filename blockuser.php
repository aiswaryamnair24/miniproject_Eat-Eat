<?php
include 'dbconnect.php';
if(!isset($_SESSION['username'])){
    header('Location:login.php');
}




if(isset($_GET['block']))
{
$user=$_GET['block'];

$sql="UPDATE `tbl_login` SET `value`='8',`status`='Blocked' WHERE username = '$user' ";
$sql2="UPDATE `tbl_registration` SET `status`='Blocked' WHERE username = '$user' ";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
if($res)
{
    header('location:userview.php');
}

}


if(isset($_GET['unblock']))
{
$user=$_GET['unblock'];

$sql="UPDATE `tbl_login` SET `value`='2',`status`='Active' WHERE username = '$user' ";
$sql2="UPDATE `tbl_registration` SET `status`='Active' WHERE username = '$user' ";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
if($res)
{
    header('location:userview.php');
}

}

else{
    die(mysqli_error($conn));
}

?>