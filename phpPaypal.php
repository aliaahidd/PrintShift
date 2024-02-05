<?php
    include('dbase.php');
    session_start();

    extract($_POST);
    $orderDate = date("d-m-Y" , time());
    $orderTime = date("H:i:s", time());
    $user_id=$_SESSION['users_userID'];

    $query = "SELECT * FROM orders where userID = '$user_id' and orderStatus = 'Added to cart'";  
    $result = mysqli_query($con, $query);  
    $countOrd =  mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0)  
    {  
         while($row = mysqli_fetch_array($result))  
         {
             $orderQuantity = $row["orderQuantity"];
             $productID = $row["productID"];
             $productSize = $row["productSize"];
             $productColour = $row["productColour"];
             $designType = $row["designType"];
             $readymadeID = $row["readymadeID"];
             $imageDesign = $row["imageDesign"];

    $update_query = "UPDATE orders set orderQuantity = '$orderQuantity', orderPayment ='$payment', orderStatus = 'Pending', orderDate = '$orderDate', orderTime = '$orderTime' where userID = '$user_id' and orderStatus = 'Added to cart' ";
    $update_queryResult = mysqli_query($con,$update_query) or die(mysqli_error($con));

    }}

    $_SESSION['countOrder'] = $_SESSION['countOrder']+$countOrd;
    $_SESSION['count'] = $_SESSION['count']-$countOrd;

    ?>
    <script>
        window.alert('Your payment has been processed successfully');
        //setTimeout(function(){ window.location.href = "http://www.paypal.com"; }, 3000);
        //window.open("http://www.paypal.com");
        location="checkStatus.php";
    </script>