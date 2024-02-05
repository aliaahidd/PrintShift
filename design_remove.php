<?php
    require 'dbase.php';
    session_start();
    $readymadeID=$_GET['id'];

    //delete order
    $delete_query = "DELETE FROM readymade where readymadeID = '$readymadeID';";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));

    header('location: admindesignlist.php');
?>