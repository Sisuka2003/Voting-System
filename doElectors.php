<?php
include './showErrors.php';
include './connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$party = $_POST['party'];
$reg = $_POST['register_id'];

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
    $insertQuery = "INSERT INTO `electors`(`full_name`,`register_id`,`party_id`)VALUES('" . $name . "','".$reg."','" . $party . "')";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('Elector Inserted successfully');location='electors.php' </script>";
        die();
    } else {
        $querys = "SELECT * FROM `electors` where `full_name`='" . $name . "'";
        $results = $connection->query($querys);
        if ($row = $results->fetch_assoc()) {
            echo "<script> alert('Elector Already Exists');location='electors.php' </script>";
            die();
        }
    }
}

if ($update) {

    $updateQuery = "UPDATE `electors` SET `full_name`='" . $name . "',`register_id`='".$reg."',`party_id`='" . $party . "' WHERE `id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $updateQuery);


    if ($isSaved) {
        echo "<script> alert('Elector Updated successfully');location='electors.php' </script>";
        die();
    } else {
        echo "<script> alert('Elector Updation Failed Please Check Whether You Have Selected The Party');location='electors.php' </script>";
        die();
    }
}

if ($delete) {

    $insertQuery = "DELETE  FROM `electors` WHERE `id`='" . $id . "'";
    $isSaved = mysqli_query($connection, $insertQuery);


    if ($isSaved) {
        echo "<script> alert('Elector Deleted successfully');location='electors.php' </script>";
        die();
    } else {
        echo "<script> alert('Elector Deletion Failed');location='electors.php' </script>";
        die();
    }
}
?>