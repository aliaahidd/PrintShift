<?php
session_start();
    require 'dbase.php';

    $userID = $_GET['id'];
    extract($_POST);
    $update_query="UPDATE users SET users_fullname='$usersFullname', users_email='$usersEmail', users_phoneNo='$usersPhoneno', users_address='$usersAddress', users_city='$usersCity', users_postalCode='$usersPoscode', users_state='$usersState' where users_userID='$userID'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    
    header('location: profile.php');
?>