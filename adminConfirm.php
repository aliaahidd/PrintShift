<?php
session_start();
    require 'dbase.php';

    $orderID = $_GET['id'];
    $userID = $_GET['userID'];
    $productID = $_GET['proID'];
    $quantity = $_GET['quantity'];
    $payment = $_GET['payment'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    
    //$orderStatus= mysqli_real_escape_string($con,$_POST['status']);
    //extract($_POST);
    //$add_query="INSERT INTO history(userID, productID, orderQuantity, statuss, orderPayment, orderDate, orderTime) values('$userID','$productID','$quantity','Confirmed','$payment','$date','$time')";
    //$delete_query="DELETE FROM orders where orderID='$orderID'";
    //$add_query_result=mysqli_query($con,$add_query) or die(mysqli_error($con));
    //$delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));

    $update_query = "UPDATE orders set orderStatus = 'Confirmed' where orderID = $orderID" ;
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));

    $_SESSION['countPending'] = $_SESSION['countPending']-1;
    $_SESSION['countHistory'] = $_SESSION['countHistory']+1;
?>
    <script>
        window.alert('Status has been confirmed');
        location="adminIndex.php";
    </script>