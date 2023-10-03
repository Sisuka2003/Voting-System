<?php
include './showErrors.php';
include './connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$district = $_POST['district'];
$pop = $_POST['porpulation'];

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
    $insertQuery = "INSERT INTO `division`(`div_name`,`dis_id`,`porpulation`)VALUES('" . $name . "','".$district."','" . $pop . "')";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('DIvision Inserted successfully');location='division.php' </script>";
        die();
    } else {
        $querys = "SELECT * FROM `division` where `div_name`='" . $name . "'";
        $results = $connection->query($querys);
        if ($row = $results->fetch_assoc()) {
            echo "<script> alert('Division Already Exists');location='division.php' </script>";
            die();
        }
    }
}

if ($update) {

    $updateQuery = "UPDATE `division` SET `div_name`='" . $name . "',`dis_id`='".$district."',`porpulation`='" . $pop . "' WHERE `id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $updateQuery);


    if ($isSaved) {
        echo "<script> alert('Division Updated successfully');location='division.php' </script>";
        die();
    } else {
        echo "<script> alert('Division Updation failed');location='division.php' </script>";
        die();
    }
}

if ($delete) {

    $insertQuery = "DELETE  FROM `division` WHERE `id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('Division Deleted successfully');location='division.php' </script>";
        die();
    } else {
        echo "<script> alert('Division Deletion Failed');location='division.php' </script>";
        die();
    }
}
?>