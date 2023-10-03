<?php
include './showErrors.php';
session_start();
include './connection.php';

$userid="";
if(isset( $_SESSION["userid"])){$userid= $_SESSION["userid"];}
if($userid===''){echo "<script> alert('Unknown Error Occured. Please Register Again');location='login.php' </script>";die();}
$nic="";
$gender="";
$name="";

if(isset($_POST['nic'])){$nic=$_POST['nic'];}
if(isset($_POST['gender'])){$gender=$_POST['gender'];}
if(isset($_POST['name'])){$name=$_POST['name'];}

if($nic===''){ echo "<script> alert('Unknown Error Occured.NIC Number Not Found');location='profile.php' </script>";die();}
if($gender===''){ echo "<script> alert('Unknown Error Occured.Gender Not Found');location='profile.php' </script>";die();}
if($name===''){ echo "<script> alert('Unknown Error Occured.Name Not Found');location='profile.php' </script>";die();}
if(isset($_POST['img'])){ echo "<script> alert('Please Select An Profile Picture Before Continuing');location='profile.php' </script>";die();}

if($gender==="male"){
    $gender="Male";
}else if($gender === "female"){
    $gender="Female";
}

$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["img"]["name"]);
$uploadOk=1;
$fileType= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($fileType != "png" && $fileType != "jpg" && $fileType != "jpeg"){
    $uploadOk=0;
}
if($uploadOk===0){
//    echo "only jpg png and jpeg formats";
}else{
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
}
$update="UPDATE voter SET profile_pic='".$target_file."',full_name='".$name."',gender='".$gender."' WHERE nic='".$nic."'";
$result=$connection->query($update);

if($result==TRUE){
    echo "<script> alert('Candidate Details Updated');location='profile.php' </script>";die();
}else{
      echo "<script> alert('Unknown Error occured in updating Candidate Details');location='profile.php' </script>";die(); 
}
?>