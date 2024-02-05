<?php
    session_start();
    require 'dbase.php';

    $ordID = $_GET['id'];

    $users_userID=$_SESSION['users_userID'];
    $user_products_query="SELECT orderID, it.productID, it.productName, it.productPrice, it.productImage, ut.orderQuantity, ut.orderPayment, ut.orderStatus, ut.orderDate, ut.orderTime, designType, rm.readymadeID, rm.readymadeImage, imageDesign from orders ut inner join product it on it.productID=ut.productID inner join readymade rm on rm.readymadeID=ut.readymadeID where ut.userID='$users_userID' and orderID = '$ordID' order by orderID DESC";
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
        <title>PrintShift | Rate Product</title>
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

        .navbar {
            border-radius: 0px;
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
            <p><a style="color: #00A693;" href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>

  <div class="column middle">
    <h2>Profile</h2>
    <h4>Rating</h4><br>
        <hr style>

    <table>
        <tr>

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

        <td>
            <?php if ($row['designType'] == 'Readymade' ){ ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['readymadeImage'] ).'" style="height: 100px;">' ?>
                              <?php } else if ($row['designType'] == 'Customize' ) { ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['imageDesign'] ).'" style="height: 100px;"> ' ?><?php } ?>
            </td>
            <td><?php echo $row['productName'];  ?><br>
            x <?php echo $row['orderQuantity'];  ?><br>
            RM<?php echo $row['productPrice'];  ?>
            <td>Pay by <?php echo $row['orderDate'];  ?>
            <?php echo $row['orderTime'];  ?></td>
            <td>RM <?php echo $subTotal  ?>.00</td>

        </tr>
    </table>
    
        <form method="post" action="postRating.php?id=<?php echo $ordID ?>">
            <center><div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
            </div></center>
            <br><br>

            </center><div><textarea type="text" name="comment" style="width: 800px; height: 200px;"></textarea></div></center>
            <center><input type="submit" value="Submit" class="btn btn-primary" name="userRating" style="right: 700px;" onclick="thanks()"></center>
        </form>
        <?php } ?>
        <script>
        function thanks(){
            window.alert("Thank you for your feedback!"); }
    </script>
  </div>

  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>
<style>
    *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    left: 40%;
    position: relative;
    text-align: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
</style>