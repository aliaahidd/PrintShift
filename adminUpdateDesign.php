<?php
//session_start();
    require 'dbase.php';

    $id = $_GET['id'];
    extract($_POST);
    
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $update_query="UPDATE readymade SET readymadeClass='$category', readymadeType='$readymadeType', readymadeName='$readymadeName', readymadeDesc='$readymadeDesc' where readymadeID='$id'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));

    if($image != ""){
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $update_image_query="UPDATE readymade SET readymadeImage='$image' where readymadeID='$id'";
        $update_image_query_result=mysqli_query($con,$update_image_query) or die(mysqli_error($con));
    }
    
    header('location: admindesignlist.php');
?>