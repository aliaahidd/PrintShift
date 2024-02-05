<?php
    session_start();
    require 'dbase.php';
    //$id=$_GET['id'];
    //$proId = $_GET['proId']; 
    $users_userID=$_SESSION['users_userID'];
    $user_products_query="SELECT orderID, it.productID, it.productName, it.productPrice, it.productImage, ut.productSize, ut.productColour, orderQuantity, designType, rm.readymadeID, rm.readymadeImage, imageDesign from orders ut inner join product it on it.productID=ut.productID inner join readymade rm on rm.readymadeID=ut.readymadeID where ut.userID='$users_userID' and  orderStatus = 'Added to cart' order by ut.orderID desc  ";
    //$user_products_query="SELECT cartID, it.productID, it.productName, it.productPrice, it.productImage, productQuantity, designType, imageDesign from cart ut inner join product it on it.productID=ut.productID where ut.userID='$users_userID'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    $totalSum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['productPrice'];
            $totalSum=$totalSum+($row['productPrice']*$row['orderQuantity']);
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Cart</title>
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
        <link href="csstyle/style.css" rel="stylesheet">

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
    </head>

<!--internal css-->
<style>
  img:hover{
    opacity: 0.5;
  }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .btn-danger{
        background-color: #f51167;
    }
    .navbar-inverse{
        background-color:#192D41;
        border-color: #192D41
    }
    .navbar-brand{
        padding: 0px 0px;
    }
    .navbar{
      margin-bottom: 0px;
      border-radius:0px;
      position: fixed;
      z-index: 997;
      right: 0;
      left: 0;
      transition: all 0.5s;
    }

    * {
  box-sizing: border-box;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 8px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: whitesmoke;
  padding: 10px;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
  .column {
    width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>

<style>

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 2;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

    img {
        width: 100px;
        
    }

    .page-top-info{
        background-color: whitesmoke;
    }

    .btn-primary {
        background-color: #f51167;
        border-color: #f51167;
    }

    .spad{
        padding-top: 10px; 
    }

.product-quantity {
  display: block;
}

input {
  max-width: 2rem;
  margin: 0;
  padding: 0.3rem 0;
  text-align: center;
  border-top: 1px solid grey;
  border-left: 1px solid grey;
  border-bottom: 1px solid grey;
  border-right: 1px solid grey;
}

.column {
  float: left;
  padding: 10px;
}
.column.side {
  width: 70%;
}
.column.middle {
  width: 30%;
}

th, td {
  font-size: 16px;
}
.cart-table {
  background-color: white;
}

.cart-table2 {
  padding: 10px 5px 0;
    background: white;
    border-radius: 27px;
    overflow: hidden;
}
</style>
<!--internal css-->
  <?php
    include('header.php');
    include('ads.php');
  ?>
        <div>
            <!-- Page info -->
	<!--<div class="page-top-info">
		<div class="container">
			<h4 >Shopping cart</h4>
			<div class="site-pagination">
				<a href="index.php">Home /</a>
				<a href="cart.php">Shopping Cart</a>	
			</div>
		</div>
	</div>-->
  <!-- Page info end -->
  
  
            <section class="cart-section spad">
            <div class="container" style="max-width: 100%;">
            <div class="cart-table column side" style="padding: 30px;">
                        <h3>Shopping Cart</h3>
                        
                        <br>
                        <div class="">
                <table class="table" style="background-color: white;">
                    <tbody>
                        <thead>
                        <tr style="background-color: #00A693;">
                            <th style="color: white; font-size: 16px;">Item Image</th>
                            <th style="color: white; font-size: 16px;">Item Name</th>
                            <th style="color: white; font-size: 16px;">Price</th>
                            <th style="color: white; font-size: 16px;">Quantity</th>
                            <th style="color: white; font-size: 16px;">Sub Total</th>
                            <th style="color: white; font-size: 16px;">Action</th></th>
                        </tr>
                        </thead>

                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                        $subTotal = 0;
                       while($row=mysqli_fetch_array($user_products_result)){
                        $subTotal = $row['productPrice'] * $row['orderQuantity'];   
                         ?>
                        <tr>
                            <th>
                              <?php if ($row['designType'] == 'Readymade' ){ ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['readymadeImage'] ).'" style="height: 100px">' ?>
                              <?php } else if ($row['designType'] == 'Customize' ) { ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['imageDesign'] ).'" style="height: 100px;"> ' ?><?php } ?>
                              
                              </th>
                              <th><?php echo $row['productName']?><br>Variation: <?php echo $row['productSize'];?>,<?php echo $row['productColour']?></th>
                              <th>RM <?php echo $row['productPrice']?></th>

                            <!--<th>
                                <div class="product-quantity">
                                <button type="button" onlclick="" class="decrement-quantity" aria-label="Subtract one" data-direction="-1"><span>&#8722;</span></button>
                                    <input data-min="1" data-max="0" type="text" name="quantity" value="<?php echo $row['orderQuantity']?>" readonly="true">
                                <button type="button" class="increment-quantity" aria-label="Add one" data-direction="1"><span>&#43;</span></button></div>

                            </th>-->
                            <th>
                                <div class="product-quantity">
                                  <form method="post" action="quantityCart.php?id=<?php echo $row['orderID']?>">

                                  <input type="submit" name="insert" value="" style="visibility: none; border-style: none;">
                                  <input type="submit" name="sub" Value="-" style="width: 20px; font-size: 20x; background-color: white;" title="Decrement quantity">
                                  <input type="text" name="quantity" value="<?php echo $row['orderQuantity']?>" size="50" >
                                  <input type="submit" name="add" Value="+" style="width: 20px; font-size: 20x; background-color: white;" title="Increment quantity"><br>
                                
                                </form>

                            </th>

                            <th>RM<?php echo $subTotal; ?></th>
                            
                            <th><a href="cart_remove.php?id=<?php echo $row['orderID'] ?>" id="remove">Remove</a></th>
                            
                        </tr>
                        
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th></th><th></th>
                            <th></th><th>Total</th>
                            <th>RM <?php echo $totalSum; ?>.00</th><th></th>
                        </tr>
                    </tbody>
                </table>
                <a href="index.php" id="continue-shopping" style="color:#f51167;">Continue Shopping</a>
            </div>
        </div>
        

        <!--cart-->

				<div class="cart-table2 column middle"  style="padding: 30px;">
        <h3 style="margin: 0px 0px 37px;">Cart Total</h3>
        <div class="">
					<form action="" method="POST">
                    <table style="  border-collapse: collapse;  width: 100%; border-radius: 10px;">
                    <tbody>
                        <thead>
                        <tr>
                            <th style="text-align: center; background-color: #00A693; color: white;" colspan="2">Cart Total</th>
                        </tr>
                        </thead>
                        <tr>
                            <th>Sub Total</th>
                            <td>RM <?php echo $totalSum?>.00</td>
                            
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <td align="right">RM 8.00</td>
                            
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>RM <?php echo $totalSum + 8; ?>.00</td>
                        </tr>
                        <tr>
                          <th colspan="2"><center><a style="color:#f51167" href="checkout.php" value="Proceed to checkout" style="text-align: center;">Proceed to Checkout</a></center></th>
                        </tr>
                    </tbody>
                </table>
				</div>
    </div>
    </div>
    </section>
    </body>

    <div class="footer">
    <?php include("footer.php"); ?>
</div>
<script>
function checkboxFunc() {
  var checkBox = document.getElementById("checkCart");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>

<script>
var input = document.getElementByName("quantity");
input.addEventListener("keypress", function(event) {
  if (event.keyCode == 13) {
   event.preventDefault();
   document.getElementByName("insert").click();
  }
});
</script>
<script>
    window.addEventListener('scroll', function() {
  document.getElementById('showScroll').innerHTML = window.pageYOffset + 'px';
});
</script>
<script>
$(function(){
    $('a#remove').click(function(){
        if(confirm('Are you sure to remove from the cart?')) {
            return true;
        }

        return false;
    });
});
</script>
</html>