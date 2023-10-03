<?php
include './showErrors.php';
session_start();
include './connection.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$gender = "";
$fname = "";
$dis = "";
$nic = "";
$div = "";
$gn_div = "";
if (isset($_POST['nic']) && isset($_POST['gender']) && isset($_POST['fname']) && isset($_POST['district']) && isset($_POST['division']) && isset($_POST['gndivision'])) {
    $gender = $_POST['gender'];
    $fname = $_POST['fname'];
    $dis = $_POST['district'];
    $nic = $_POST['nic'];
    $div = $_POST['division'];
    $gn_div = $_POST['gndivision'];
    $_SESSION["vid"]=$nic;
}
$div_id = "";
$ok = "";
$ok2 = "";
$gnid = "";

//check whether the division is valid
$disquery = "SELECT * FROM `division` WHERE `div_name`='".$div."' AND `dis_id`='" . $dis . "' ";
$resultuns = $connection->query($disquery);

if ($rowuns = $resultuns->fetch_assoc()) {

    $divname = $rowuns['div_name'];
    $div_id = $rowuns['id'];

    if ($divname != $div) {
        echo "<script> alert('The Division Detail Is Invalid');</script>";
    } else {
        $ok = "okay1";
//        echo "okay1";
    }
}
//check whether the gn_division is valid
//echo $gn_div;
$divquery = "SELECT * FROM `gn_division` WHERE `gn_div_name`='".$gn_div."' AND `div_id`='" . $div_id . "' ";
$resultuns1 = $connection->query($divquery);
if ($rowuns1 = $resultuns1->fetch_assoc()) {
    $gndivName = $rowuns1['gn_div_name'];
       $gnid = $rowuns1['id'];
       $ok2="okay2";
    } else {
        echo "<script> alert('The GN Division Detail Is Invalid');</script>";
    }


    $status="can vote";
if ($ok == "okay1" && $ok2 == "okay2") {
    $okk=false;
    $selectExistingQuery="select * from voter where nic='".$nic."'";
    $resultExist=$connection->query($selectExistingQuery);
    if($rowExis=$resultExist->fetch_assoc()){
        echo "<script> alert('NIC number Already Exists');location='register.php' </script>";
    }else{
        $okk=true;
    }
    
if($okk){
    $hquery = "INSERT INTO `voter`(`full_name`,`nic`,`gender`,`profile_pic`,`district_id`,`division_id`,`gn_division_id`,`status`)VALUES('" . $fname . "','" . $nic . "','" . $gender . "','images/gallery.png','" . $dis . "','" . $div_id . "','" . $gnid . "','".$status."')";

    $isSaved = mysqli_query($connection, $hquery);
    if ($isSaved) {
        $_SESSION["name"] = $fname;
        $_SESSION["is_login"] = true;
        $_SESSION["userid"] =$nic;

    } else {
        echo "<script> alert('Error occured : Please Get Registered Again');location='register.php' </script>";
    }
        
    $dis_count=0;
    $div_count=0;
    $gndiv_count=0;
    $dis_update_okay="";
    $div_update_okay="";
    $gndiv_update_okay="";
    
    $selectDisQuery="select * from voter where district_id='".$dis."'";
    $resultDisCount = $connection->query($selectDisQuery);
while ($rowDis = $resultDisCount->fetch_assoc()) {
   $dis_count=$dis_count+1;
    } 
    
     $updateDisQuery = "UPDATE `district` SET `porpulation`='" . $dis_count . "' WHERE `id`='" . $dis . "'";
    $isDisSaved = mysqli_query($connection, $updateDisQuery);
    if ($isDisSaved) {
    $dis_update_okay="okay";
    }else{
        echo "district population error";
    } 
    
    
    $selectDivQuery="select * from voter where division_id='".$div_id."'";
     $resultDivCount = $connection->query($selectDivQuery);
while ($rowdiv = $resultDivCount->fetch_assoc()) {
   $div_count=$div_count+1;
    } 
    
     $updateDivQuery = "UPDATE `division` SET `porpulation`='" . $div_count . "' WHERE `id`='" . $div_id . "'";
    $isDivSaved = mysqli_query($connection, $updateDivQuery);
    if ($isDivSaved) {
    $div_update_okay="okay";
    }else{
        echo "division population error";
    } 

    
    
    
    $selectgnDivQuery="select * from voter where gn_division_id='".$gnid."'";
     $resultgnDivCount = $connection->query($selectgnDivQuery);
while ($rowgndiv = $resultgnDivCount->fetch_assoc()) {
   $gndiv_count=$gndiv_count+1;
    } 
    
     $updategnDivQuery = "UPDATE `gn_division` SET `porpulation`='" . $gndiv_count . "' WHERE `id`='" . $gnid . "'";
    $isgnDivSaved = mysqli_query($connection, $updategnDivQuery);
    if ($isgnDivSaved) {
    $gndiv_update_okay="okay";
    }else{
        echo "GN Division population error";
    } 
    
    if(($dis_update_okay == $div_update_okay) && ($div_update_okay==$gndiv_update_okay)){
        echo "<script> alert('Candidate Registered Successfully!!');location='profile.php' </script>";
        echo "okay3";
    }
}
    
}
?>

