<?php
include './showErrors.php';
include './connection.php';

$id=$_POST['id'];
$name=$_POST['name'];
$color=$_POST['color'];

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



$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["img"]["name"]);
$uploadOk=1;
$fileType= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($fileType != "png" && $fileType != "jpg" && $fileType != "jpeg"){
    $uploadOk=0;
}
if($uploadOk===0){
    echo "<script> alert(only jpg png and jpeg formats);location='party.php' </script>";
}else{
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
}

if($in){
    
$insertQuery = "INSERT INTO `party`(`name`,`color`,`image`)VALUES('".$name."','".$color."','".$target_file."')";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('Party Inserted successfully');location='party.php' </script>";die();
} else {
    $querys="SELECT * FROM `party` where `name`='".$name."'";
      $results = $connection->query($querys);
      if ($row = $results->fetch_assoc()) {
      echo "<script> alert('Party Already Exists');location='party.php' </script>";die();
      }
}
}

if($update){
    
$updateQuery = "UPDATE `party` SET `name`='".$name."',`color`='".$color."',`image`='".$target_file."' WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $updateQuery);


if ($isSaved) {
      echo "<script> alert('Party Updated successfully');location='party.php' </script>";die();
} else {
      echo "<script> alert('Party Updation failed');location='party.php' </script>";die();
}
}

if($delete){
    
$insertQuery = "DELETE  FROM `party` WHERE `id`='".$id."'";
$isSaved = mysqli_query($connection, $insertQuery);


if ($isSaved) {
      echo "<script> alert('Party Deleted successfully');location='party.php' </script>";die();
} else {
      echo "<script> alert('Party Deletion Failed');location='party.php' </script>";die();
}
}
?>