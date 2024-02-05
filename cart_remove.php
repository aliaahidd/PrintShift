<?php
    require 'dbase.php';
    session_start();
    $orderID=$_GET['id'];
    $user_id=$_SESSION['users_userID'];

    //delete order
    $deleteOrd_query = "DELETE FROM orders where userID='$user_id' and orderID = '$orderID';";
    $deleteOrd_query_result=mysqli_query($con,$deleteOrd_query) or die(mysqli_error($con));

    $_SESSION['count'] = $_SESSION['count']-1;
    header('location: cart.php');
?>