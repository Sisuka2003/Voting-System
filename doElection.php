<?php
include './showErrors.php';
include './connection.php';

$id=$_POST['id'];
$year=$_POST['year'];

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
    
$insertQuery = "INSERT INTO `general_election`(`year`)VALUES('".$year."')";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('General Election Record Inserted successfully');location='general_election.php' </script>";die();
} else {
    $querys="SELECT * FROM `general_election` where `year`='".$name."'";
      $results = $connection->query($querys);
      if ($row = $results->fetch_assoc()) {
      echo "<script> alert('General Election Record Already Exists');location='general_election.php' </script>";die();
      }
}
}

if($update){
    
$updateQuery = "UPDATE `general_election` SET `year`='".$year."' WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $updateQuery);

if ($isSaved) {
      echo "<script> alert('General Election Record Updated successfully');location='general_election.php' </script>";die();
} else {
      echo "<script> alert('General Election Record Updation failed');location='general_election.php' </script>";die();
}
}

if($delete){
    
$insertQuery = "DELETE  FROM `general_election` WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('General Election Record Deleted successfully');location='general_election.php' </script>";die();
} else {
      echo "<script> alert('General Election Record Deletion Failed');location='general_election.php' </script>";die();
}
}
?>