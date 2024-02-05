	<?php
    session_start();
    require 'dbase.php';
    $users_userID=$_SESSION['users_userID'];
    $user_products_query="SELECT orderID, it.productID,it.productName,it.productPrice,it.productImage, orderQuantity, designType, rm.readymadeID, rm.readymadeImage, imageDesign from orders ut inner join product it on it.productID=ut.productID inner join readymade rm on rm.readymadeID=ut.readymadeID where ut.userID='$users_userID'  and  orderStatus = 'Added to cart' order by ut.orderID desc";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    $totalSum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("No items in the cart!!");
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
        <title>PrintShift | Checkout</title>
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
    .site-btn{
      background: #337ab7
    }

    .checkout-form .cf-title {
      background: #192D41;

    }
</style>
<!--internal css-->
  <?php
    include('header.php');
    include('ads.php');
  ?>
        <div>
            <!-- Page info -->

	<!-- Page info end -->
            <section class="cart-section spad">
            <div class="container">
            <div class="row">
            <div class="col-lg-8">
            <section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form method="post" action="phpPaypal.php" class="checkout-form" enctype="multipart/form-data">
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>Billing Information</p>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<?php
								include("dbase.php");  
												$query = "SELECT * FROM users where users_userID = '".$_SESSION['users_userID']."'";  
												$result = mysqli_query($con, $query);  
												if(mysqli_num_rows($result) > 0)  
												{  
													 while($row = mysqli_fetch_array($result))  
													 {
														 $users_userID = $row["users_userID"];
														 $users_phoneNo = $row["users_phoneNo"];
														 $users_address = $row["users_address"];
														 $users_city = $row["users_city"];
														 $users_state = $row["users_state"];
														 $users_postalCode = $row["users_postalCode"];      
								?>
								<input type="text" placeholder="Address" value="<?php echo $users_address; ?>" required>
								<input type="text" placeholder="City" value="<?php echo $users_city; ?>" required>
								<input type="text" placeholder="State" value="<?php echo $users_state; ?>" required> <?php }}?>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Postal code" value="<?php echo $users_postalCode; ?>" required>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone Number" value="<?php echo $users_phoneNo; ?>" required>
							</div>
						</div>

						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li><input type="radio" value="Paypal" name="payment"> Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
							<li><input type="radio" value="Credit" name="payment"> Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
						</ul>
						
						<input type = submit class="site-btn submit-order-btn" value = "Place Order">
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Cart Total</h3>
						<ul class="product-list">
						<?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                         ?>
							<li>
								<div class="pl-thumb">
                <?php if ($row['designType'] == 'Readymade' ){ ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['readymadeImage'] ).'" style="height: 100px;">' ?>
                              <?php } else if ($row['designType'] == 'Customize' ) { ?>
                              <?php echo '<img src="data:image;base64,'.base64_encode( $row['imageDesign'] ).'" style="height: 100px;"> ' ?><?php } ?>
                </div>
								<h6><?php echo $row['productName']?> (<?php echo $row['designType']?>)</h6>
								<p>RM <?php echo $row['productPrice']?></p>
								<p>x<?php echo $row['orderQuantity']?></p>
							</li>

                       <?php $counter=$counter+1;}?>

						</ul>
						<ul class="price-list">
							<li>Total<span>RM<?php echo $totalSum;?></span></li>
							<li>Shipping<span>RM8</span></li>
							<li class="total">Total<span>RM<?php echo $totalSum + 8;?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
				</div>
			</div>
		</div>
    </section>
    <?php include('footer.php')?>
    </body>
<script>
    (function (){
    var radios = document.getElementsByName('payment');
    console.log(radios);
    for(var i = 0; i < radios.length; i++){
        radios[i].onclick = function(){
            document.getElementById('choiceLabel').innerText = this.value;
        }
    }
})();
</script>
</html>