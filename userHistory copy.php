<?php
    session_start();
    require 'dbase.php';
    $users_userID=$_SESSION['users_userID'];
    $user_products_query="SELECT orderID, it.productID, it.productName, it.productPrice, it.productImage, ut.orderQuantity, ut.orderPayment, ut.orderStatus, ut.orderDate, ut.orderTime from orders ut inner join product it on it.productID=ut.productID where ut.userID='$users_userID' and orderStatus = 'Confirmed' order by orderID DESC";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    $totalSum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No history here");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['productPrice'];
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>Button</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css2/font-awesome.min.css"/>
	    <link rel="stylesheet" href="css2/flaticon.css"/>
	    <link rel="stylesheet" href="css2/slicknav.min.css"/>
	    <link rel="stylesheet" href="css2/jquery-ui.min.css"/>
	    <link rel="stylesheet" href="css2/owl.carousel.min.css"/>
	    <link rel="stylesheet" href="css2/animate.css"/>
        <link rel="stylesheet" href="css2/style.css"/>
        
        <style>
        .navbar-inverse{
            background-color:#192D41;
            border-color: #192D41
        }

        .navbar-brand{
            padding: 0px 0px;
        }

        .column {
            float: left;
            padding: 10px;
        }

        /* Left and right column */
        .column.side {
            width: 15%;
        }
        .column.middle {
            width: 85%;
        }

        .column.side-right {
            width: 0%
        }

        .main {
            max-width: 90%;
            margin: auto;
        }

        .footer {
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }
        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        th, td {
            padding: 25px;
            text-align: center;
        }
        img{
            width: 100px;
        }

    </style>
    </head>
    <?php include("header.php"); ?>

    <body>
    <?php 
                $query = "SELECT * FROM users where users_email = '".$_SESSION['users_email']."'";  
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {      
?>
    <div class="main">
    <div class="column side">
    <p><?php echo '<img style="width: 40px; height: 40px; border-radius: 50%;" src="data:image;base64,'.base64_encode( $row['profileImage'] ).'" id="profImg">'?>
                     <?php echo $row['users_username']; ?></p><?php }} ?>
        <hr>
            <h6>My Account</h6>
        <hr>
            <p><a href = "profile.php" >Profile</p></a>
            <p><a href = "changePassword.php" >Change Password</a></p>
        <hr>
            <h6>Order</h6>
        <hr>
        <p><a href = "checkStatus.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countOrder']; ?></span></p>
            <p><a href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>

  <div class="column middle">
    <h2>Profile</h2>
    <h4>History</h4><br>
        <hr style>

 <div style="background-color: whitesmoke;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <table>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Status</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Time</th>
            <th>Product Price</th>
            <th>Action</th>
        </tr>

        <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                        $subTotal = 0;
                       while($row=mysqli_fetch_array($user_products_result)){
                        $subTotal = $row['productPrice'] * $row['orderQuantity'];   
                         ?>
        <tr>
        <form method="post" action="deleteHistory.php?id=<?php echo $row['historyID']?>">
        <td><?php echo '<img src="data:image;base64,'.base64_encode( $row['productImage'] ).'" id="">'?></td>
            <td><?php echo $row['productName'];  ?> 
            <td style=" color: green;"><?php echo $row['orderStatus'];?></td>  
            <td>x <?php echo $row['orderQuantity'];  ?></td>
            <td>RM<?php echo $row['productPrice'];  ?></td>
            <td>Pay by <?php echo $row['orderDate'];  ?>
            <?php echo $row['orderTime'];  ?></td>
            <td>Sub Total : RM <?php echo $subTotal  ?>.00</td>
            <td><input type="submit" value="Delete History" class="btn btn-primary"></td>
            </form> 
        </tr>
        <?php } ?>
    </table>

</div>
  </div>

  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>