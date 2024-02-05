<?php
    session_start();
    require 'dbase.php';

    $limit = 4;  
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
        $start_from = ($page-1) * $limit;  

    $users_userID=$_SESSION['users_userID'];
    $user_products_query="SELECT orderID, it.productID, it.productName, it.productPrice, it.productImage, ut.orderQuantity, ut.orderPayment, ut.orderStatus, ut.orderDate, ut.orderTime, designType, rm.readymadeID, rm.readymadeImage, imageDesign from orders ut inner join product it on it.productID=ut.productID inner join readymade rm on rm.readymadeID=ut.readymadeID where ut.userID='$users_userID' and orderStatus = 'Rated' or orderStatus = 'Received' order by orderID DESC LIMIT $start_from, $limit";
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
        <title>PrintShift | Order Completed</title>
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
                $query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
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
            <p><a href = "userHistory.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countComplete']; ?></span></p>
            <p><a style="color: #00A693;" href = "orderComplete.php" >Order History</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $_SESSION['countHistory']; ?></span></p>
  </div>

  <div class="column middle">
    <h2>Profile</h2>
    <h4>Order Completed</h4><br>
        <hr style>

 <div style="background-color: whitesmoke;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <table>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Date & Time</th>
            <th>Total Price</th>
            <th>Status</th>
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
            <td><?php echo $row['productName'];  ?>           
            <td>RM<?php echo $row['productPrice'];  ?></td> 
            <td>x <?php echo $row['orderQuantity'];  ?></td>         
            <td><?php echo $row['orderDate'];  ?>
            <?php echo $row['orderTime'];  ?></td>
            <td>RM<?php echo $subTotal + 8 ?>.00</td>
            <?php if ($row['orderStatus'] == 'Received'){ ?>
                    <form method="POST" action="userRating.php?id=<?php echo $row['orderID'];?>">
            <td><input type="submit" name="userRating" value="Rate" class="btn btn-primary"></td>
                </form>
                <?php } else if ($row['orderStatus'] == 'Rated'){ ?>
                <td style=" color: green;"><?php echo $row['orderStatus'];?></td><?php } ?> 

        </tr>
        <?php } ?>
    </table>

</div>
<?php  

$sql = "SELECT COUNT(orderID) FROM orders where  userID = '".$_SESSION['users_userID']."' and orderStatus = 'Rated'" ;  
$rs_result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
//$pagLink = "<center><div class='pagination'>";  
//for ($i=1; $i<=$total_pages; $i++) { 
            //$pagLink .= "<a href='checkStatus.php?page=".$i."'>".$i."</a>";  
//};  
//echo $pagLink . "</div></center>";  
?>

<div class='pagination'>
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
//$color = $_GET['page'];  
    if($i == 1):?>
    <a href='orderComplete.php?page=<?php echo $i;?>'><?php echo $i;?></a>
    <?php else:?>
    <a class="" href='orderComplete.php?page=<?php echo $i;?>'><?php echo $i;?></a>
<?php endif;?>			
<?php endfor;endif; 
//echo $pagLink . "</div></center>";  
?>  
    </div>
<style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}
.pagination a.active {
  background-color: pink;
  color: white;
  border: 1px solid pink;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
  </div>

  </div>
    </body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="footer">
    <?php include("footer.php"); ?>
</div>

</html>