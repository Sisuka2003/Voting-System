<?php
include './showErrors.php';
session_start();
if (isset($_SESSION["is_login"])) {
    if (($_SESSION["is_login"] == true)) {  // The user is  logged in to the home.
        header("Location: hlo.php");die(); // User log wela inne ee nisa home page ekata directed wenawa. mokada amuthuwen check karanna deyak nh username password.
    }
} else {
    include './connection.php';
    $pw = "";
    $pass="";
    if (isset($_POST["nic"])) {
        $pw = $_POST["nic"];
       
    $_SESSION["vid"]=$pw;
        $searchAdminQuery="select * from `admin` where `password`='".$pw."'";
        
           $result = $connection->query($searchAdminQuery);
            if ($row = $result->fetch_assoc()) {
                $pass=$row['password'];
            }
        if ($pw==$pass) {
            $_SESSION["is_admin_login"] = true;
            header("Location:  admin_home.php");
            exit();
        } else {

            $searchQuery = "SELECT * FROM `voter` WHERE `nic`='".$pw."'";

            $result = $connection->query($searchQuery);
            if ($row = $result->fetch_assoc()) {
                $_SESSION["is_login"] = true;    
                $_SESSION["userid"]=$row['nic'];
                header("Location:  profile.php");
                exit();
            } else{
                    echo "<script> alert('Please check your Registration');location='register.php' </script>";
                }
            }
        }
    }
?>