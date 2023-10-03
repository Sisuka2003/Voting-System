<?php
include './showErrors.php';
include './connection.php';

$id=$_POST['id'];
$un=$_POST['name'];
$pw=$_POST['pswd'];
$des=$_POST['designation'];

$in="";
$update="";
$delete="";

if(isset($_POST['insert'])){
    $in=$_POST['insert'];
}
if(isset($_POST['update'])){
    $update=$_POST['update'];
}
if(isset($_POST['delete'])){
    $delete=$_POST['delete'];
}

if($in){
    
$insertQuery = "INSERT INTO `admin`(`username`,`password`,`designation`)VALUES('".$un."','".$pw."','".$des."')";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('Admin Inserted successfully');location='admin.php' </script>";die();
} else {
    $querys="SELECT * FROM `admin` where `password`='".$pw."'";
      $results = $connection->query($querys);
      if ($row = $results->fetch_assoc()) {
      echo "<script> alert('Password Already Exists');location='admin.php' </script>";die();
      }
}
}

if($update){
    
$updateQuery = "UPDATE `admin` SET `username`='".$un."',`password`='".$pw."',`designation`='".$des."' WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $updateQuery);


if ($isSaved) {
      echo "<script> alert('Admin Updated successfully');location='admin.php' </script>";die();
} else {
      echo "<script> alert('Admin Updation failed');location='admin.php' </script>";die();
}
}

if($delete){
    
$insertQuery = "DELETE  FROM `admin` WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('Admin Deleted successfully');location='admin.php' </script>";die();
} else {
      echo "<script> alert('Admin Deletion Failed');location='admin.php' </script>";die();
}
}
?>