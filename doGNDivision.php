<?php
include './showErrors.php';
include './connection.php';

$id=$_POST['id'];
$gndivision=$_POST['gnname'];
$division=$_POST['divname'];
$pop=$_POST['porpulation'];

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
    $div_id;

    $querydiv = "SELECT * FROM `division` WHERE `div_name` LIKE '%" . $division . "%'";
    
    $resultdiv = $connection->query($querydiv);
    
    if ($rowdiv = $resultdiv->fetch_assoc()) {
        $div_id = $rowdiv["id"];
    }
    
$insertQuery = "INSERT INTO `gn_division`(`gn_div_name`,`div_id`,`porpulation`)VALUES('".$gndivision."','".$div_id."','".$pop."')";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('GN Division Inserted successfully');location='gn_division.php' </script>";die();
} else {
    $querys="SELECT * FROM `gn_division` where `gn_div_name`='".$gndivision."'";
      $results = $connection->query($querys);
      if ($row = $results->fetch_assoc()) {
      echo "<script> alert('GN Division Already Exists');location='gn_division.php' </script>";die();
      }
}
}

if($update){
    $div_id;

    $querydiv = "SELECT * FROM `division` WHERE `div_name` LIKE '%" . $division . "%'";
    
    $resultdiv = $connection->query($querydiv);
    
    if ($rowdiv = $resultdiv->fetch_assoc()) {
        $div_id = $rowdiv["id"];
    }
    
    
$updateQuery = "UPDATE `gn_division` SET `gn_div_name`='".$gndivision."',`div_id`='".$div_id."',`porpulation`='".$pop."' WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $updateQuery);


if ($isSaved) {
      echo "<script> alert('GN Division Updated successfully');location='gn_division.php' </script>";die();
} else {
      echo "<script> alert('GN Division Updation failed');location='gn_division.php' </script>";die();
}
}

if($delete){
    
$insertQuery = "DELETE  FROM `gn_division` WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('GN Division Deleted successfully');location='gn_division.php' </script>";die();
} else {
      echo "<script> alert('GN Division Deletion Failed');location='gn_division.php' </script>";die();
}
}
?>