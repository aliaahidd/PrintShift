<!--<?php
//session_start();
    //require 'dbase.php';

    //$userID = $_GET['id'];
    //$orderStatus= mysqli_real_escape_string($con,$_POST['status']);
    //extract($_POST);
    //$update_query="UPDATE users SET profileImage='$image' where users_userID='$userID'";
    //$update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    //header('location: profile.php');
?>-->

<?php 
// Include the database configuration file  
session_start();
require 'dbase.php';
$userID = $_GET['id']; 
extract($_POST);

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    if($image != "")
    {
    $update_query = "UPDATE users SET profileImage='$image' where users_userID='$userID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    }


header('location: profile.php');
?>