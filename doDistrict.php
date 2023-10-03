<?php
include './showErrors.php';
include './connection.php';

$id=$_POST['id'];
$name=$_POST['name'];
$pop=$_POST['porpulation'];
$seats=$_POST['seats'];

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
    
$insertQuery = "INSERT INTO `district`(`dis_name`,`porpulation`,`seats`)VALUES('".$name."','".$pop."','".$seats."')";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('District Inserted successfully');location='districts.php' </script>";die();
} else {
    $querys="SELECT * FROM `district` where `dis_name`='".$name."'";
      $results = $connection->query($querys);
      if ($row = $results->fetch_assoc()) {
      echo "<script> alert('District Already Exists');location='districts.php' </script>";die();
      }
}
}

if($update){
    
$updateQuery = "UPDATE `district` SET `dis_name`='".$name."',`porpulation`='".$pop."',`seats`='".$seats."' WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $updateQuery);


if ($isSaved) {
      echo "<script> alert('District Updated successfully');location='districts.php' </script>";die();
} else {
      echo "<script> alert('District Updation failed');location='districts.php' </script>";die();
}
}

if($delete){
    
$insertQuery = "DELETE  FROM `district` WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('District Deleted successfully');location='districts.php' </script>";die();
} else {
      echo "<script> alert('District Deletion Failed');location='districts.php' </script>";die();
}
}
?>