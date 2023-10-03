<?php

include './showErrors.php';
include './connection.php';

$id = $_POST['id'];
$nic = $_POST['nic'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dis = $_POST['district'];
$div = $_POST['division'];
$gndiv = $_POST['gn_division'];

$in = "";
$update = "";
$delete = "";

if (isset($_POST['insert'])) {
    $in = $_POST['insert'];
}
if (isset($_POST['update'])) {
    $update = $_POST['update'];
}
if (isset($_POST['delete'])) {
    $delete = $_POST['delete'];
}

if ($in) {

    $dis_id;
    $div_id;
    $gnd_id;

    $querydis = "SELECT * FROM `district` WHERE `dis_name` LIKE '%" . $dis . "%'";
    $querydiv = "SELECT * FROM `division` WHERE `div_name` LIKE '%" . $div . "%'";
    $querygn = "SELECT * FROM `gn_division` WHERE `gn_div_name` LIKE '%" . $gndiv . "%'";

    $resultdis = $connection->query($querydis);
    $resultdiv = $connection->query($querydiv);
    $resultgn = $connection->query($querygn);
    if ($rowdis = $resultdis->fetch_assoc()) {
        $dis_id = $rowdis["id"];
    }
    if ($rowdiv = $resultdiv->fetch_assoc()) {
        $div_id = $rowdiv["id"];
    }
    if ($rowgn = $resultgn->fetch_assoc()) {
        $gnd_id = $rowgn["id"];
    }


    $insertQuery = "INSERT INTO `voter`(`nic`,`full_name`,`gender`,`district_id`,`division_id`,`gn_division_id`)VALUES('" . $nic . "','" . $name . "','" . $gender . "','" . $dis_id . "','" . $div_id . "','" . $gnd_id . "')";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('Voter Inserted successfully');location='voter.php' </script>";
        die();
    } else {
        $querys = "SELECT * FROM `voter` where `nic`='" . $nic . "'";
        $results = $connection->query($querys);
        if ($row = $results->fetch_assoc()) {
            echo "<script> alert('Voter Already Exists');location='voter.php' </script>";
            die();
        }
    }
}

if ($update) {
    $dis_id;
    $div_id;
    $gnd_id;

    $querydis = "SELECT * FROM `district` WHERE `dis_name` LIKE '%" . $dis . "%'";
    $querydiv = "SELECT * FROM `division` WHERE `div_name` LIKE '%" . $div . "%'";
    $querygn = "SELECT * FROM `gn_division` WHERE `gn_div_name` LIKE '%" . $gndiv . "%'";

    $resultdis = $connection->query($querydis);
    $resultdiv = $connection->query($querydiv);
    $resultgn = $connection->query($querygn);
    if ($rowdis = $resultdis->fetch_assoc()) {
        $dis_id = $rowdis["id"];
    }
    if ($rowdiv = $resultdiv->fetch_assoc()) {
        $div_id = $rowdiv["id"];
    }
    if ($rowgn = $resultgn->fetch_assoc()) {
        $gnd_id = $rowgn["id"];
    }

    $updateQuery = "UPDATE `voter` SET `nic`='" . $nic . "',`full_name`='" . $name . "',`gender`='" . $gender . "',`district_id`='" . $dis_id . "',`division_id`='" . $div_id . "',`gn_division_id`='" . $gnd_id . "' WHERE `voter_id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $updateQuery);

    if ($isSaved) {
        echo "<script> alert('Voter Updated successfully');location='voter.php' </script>";
        die();
    } else {
        echo "<script> alert('Voter Updation failed');location='voter.php' </script>";
        die();
    }
}

if ($delete) {

    $insertQuery = "DELETE  FROM `voter` WHERE `voter_id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('Voter Deleted successfully');location='voter.php' </script>";
        die();
    } else {
        echo "<script> alert('Voter Deletion Failed');location='voter.php' </script>";
        die();
    }
}
?>