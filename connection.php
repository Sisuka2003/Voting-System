<?php  
include './showErrors.php';
$username="root";
$password="20030909";
$databaseName="web_01_voting_system";
$hostUrl="localhost";
$hostPort="3307";
$connection=new mysqli($hostUrl, $username,$password,$databaseName,$hostPort);
if($connection->connect_error){
    echo "Error Not connected".$connection->connect_error;
}else{
   //echo "connect successfully";
}
?>