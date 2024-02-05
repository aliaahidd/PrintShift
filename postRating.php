<?php
    require 'dbase.php';
    session_start();

    $userID=$_SESSION['users_userID'];
    $orderID = $_GET['id'];  

    if(isset($_POST['userReceived'])){
        $queryReceived = "UPDATE orders set orderStatus = 'Received' where orderID = '$orderID'";
        $resultReceived=mysqli_query($con,$queryReceived) or die(mysqli_error($con));

        $_SESSION['countComplete'] = $_SESSION['countComplete']-1;
        $_SESSION['countHistory'] = $_SESSION['countHistory']+1;

        header('location: orderComplete.php');
    }

    

    if(isset($_POST['userRating'])){
        extract($_POST);
    
    $queryFeedback="INSERT INTO feedback(userID,orderID,feedbackStar,feedbackComment) values ('$userID','$orderID','$rate','$comment')";
    $resultFeedback=mysqli_query($con,$queryFeedback) or die(mysqli_error($con));

    $queryUpdate = "UPDATE orders set orderStatus = 'Rated' where orderID = '$orderID'";
    $result=mysqli_query($con,$queryUpdate) or die(mysqli_error($con));
    ?>
    <script>
            window.alert("Thank you for your feedback!"); 
    </script>
    <?php

    header('location: orderComplete.php');
    }
?>
