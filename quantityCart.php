<?php
    require 'dbase.php';
    session_start();

    $orderID = $_GET['id'];
    extract($_POST);

    if (isset($_POST['insert'])) {
        $quantityCart = $quantity;
    } 
    if (isset($_POST['sub'])) {
        $quantityCart = $quantity - 1;
    } 
    if (isset($_POST['add'])) {
        $quantityCart = $quantity + 1;
    }

    $update_quantity="UPDATE orders SET orderQuantity='$quantityCart' where orderID='$orderID'";
    $update_query_result=mysqli_query($con,$update_quantity) or die(mysqli_error($con));

    header('location: cart.php');  
?>