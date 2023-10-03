<?php
include './showErrors.php';
session_start();
include './connection.php';

$userid="";
$pid="";
$mem1="";
$mem2="";
$mem3="";
$dis_id="";
$div_id="";
$vote_sts="";
$curyear=date('Y');
$gid="";

if(isset($_POST['pid']) && isset($_POST['mem1']) && isset($_POST['mem2']) && isset($_POST['mem3'])){
    $pid=$_POST['pid'];
    $mem1=$_POST['mem1'];
    $mem2=$_POST['mem2'];
    $mem3=$_POST['mem3'];
    $userid = $_SESSION["userid"];
}


if(($mem1 == $mem2) && ($mem2 == $mem3)){
    echo "<script> alert('Invalid Member Selection');location='home.php' </script>";die();
}
else if($mem1== $mem2){
    echo "<script> alert('Member 1 and Member 2 Details Cannot Be The Same');location='home.php' </script>";die();
}
else if($mem2 == $mem3){
    echo "<script> alert('Member 2 and Member 3 Details Cannot Be The Same');location='home.php' </script>";die();
}
else if($mem1 == $mem3){
    echo "<script> alert('Member 1 and Member 3 Details Cannot Be The Same');location='home.php' </script>";die();
}

$selectQuery="select * from voter where nic ='".$userid."'";
  $result = $connection->query($selectQuery);
            if ($row = $result->fetch_assoc()) {
               $dis_id=$row['district_id'];
               $div_id=$row['division_id'];
               $vote_sts=$row['status'];
            }

            
            $selectQ2="select * from general_election where year ='".$curyear."'";
             $result2 = $connection->query($selectQ2);
            if ($row2 = $result2->fetch_assoc()) {
               $gid=$row2['id'];
            }
            
//                echo $pid;
                ?>
<!--<br/>-->
<?php
//    echo $mem1;
//       ?>
<!--<br/>-->
<?php
//    echo $mem2;
//       ?>
<!--<br/>-->
<?php
//    echo $mem3;
//       ?>
<!--<br/>-->
<?php
//    echo $userid;
//       ?>
<!--<br/>-->
<?php
//echo $dis_id;
//   ?>
<!--<br/>-->
<?php
//echo $div_id;
//   ?>
<!--<br/>-->
<?php
//echo $curyear;
//   ?>
<!--<br/>-->
<?php
//echo $gid;
    
$insertQuery="insert into p_votings(gid,party_id,dsitrict_id,division_id,member1,member2,member3)values('".$gid."','".$pid."','".$dis_id."','".$div_id."','".$mem1."','".$mem2."','".$mem3."')";
$isSaved = mysqli_query($connection, $insertQuery);
    if ($isSaved) {
        $status2="voted";
        $updateVoterStatus="update voter set status='".$status2."' where nic='".$userid."'";
        $resultup=$connection->query($updateVoterStatus);
 
        if($resultup==TRUE){
        echo "<script> alert('Thank You For Your Submission');location='profile.php' </script>";die();
        }else{
        echo "<script> alert('Something Went Wrong');location='home.php' </script>";die();
        }
    } else {
        echo "<script> alert('Error occured : Please Re-Check Your Form Details');location='home.php' </script>";die();
    }
?>
