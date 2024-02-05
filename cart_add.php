<?php
    require 'dbase.php';
    session_start();

    $userID=$_SESSION['users_userID'];
    $proId = $_GET['proId'];  
    
    //from readymade
    if (isset($_POST['rmBtn'])){
    $id=$_GET['id'];
    extract($_POST);
    $productSize= mysqli_real_escape_string($con,$_POST['productSize']);
    $productColour= mysqli_real_escape_string($con,$_POST['productColour']);
    $productQuantity= mysqli_real_escape_string($con,$_POST['productQuantity']);

    //$add_to_cart_query="INSERT INTO cart(userID,productID,productSize,productColour,productQuantity,designType,readymadeID,imageDesign) values ('$userID','$proId','$productSize','$productColour','$productQuantity','Readymade','$id','')";
    //$add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));

    $queryreadymadeOrd="INSERT INTO orders(userID,productID,productSize,productColour,orderQuantity,designType,readymadeID,imageDesign,orderStatus) values ('$userID','$proId','$productSize','$productColour','$productQuantity','Readymade','$id','','Added to cart')";
    $resultreadymadeOrd=mysqli_query($con,$queryreadymadeOrd) or die(mysqli_error($con));
}
    
    //from design
    if (isset($_POST['dsgnBtn'])){
    extract($_POST);

    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    //$queryDesign="INSERT INTO cart(userID,productID,productSize,productColour,productQuantity,designType,readymadeID,imageDesign) values ('$userID','$proId','$productSize','$productColour','$productQuantity','Customize','1','$image')";
    //$resultDesign=mysqli_query($con,$queryDesign) or die(mysqli_error($con));

    $queryDesignOrd="INSERT INTO orders(userID,productID,productSize,productColour,orderQuantity,designType,readymadeID,imageDesign,orderStatus) values ('$userID','$proId','$productSize','$productColour','$productQuantity','Customize','2','$image','Added to cart')";
    $resultDesignOrd=mysqli_query($con,$queryDesignOrd) or die(mysqli_error($con));
    
    }
    $_SESSION['count'] = $_SESSION['count']+1;
    header('location: cart.php');
?>
