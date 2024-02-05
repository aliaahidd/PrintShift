<?php
//Start session
session_start();
require 'dbase.php';
$userid = $_SESSION['userId'];
$user_products_query="SELECT cartId, it.id, it.name, it.ppdkName, it.price, it.image, quantity from cart ta inner join product it on it.id=ta.productId where ta.userId='$userid'";
$user_products_result=mysqli_query($conn, $user_products_query) or die(mysqli_error($conn));
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
		$sum=$sum=$row['price'];
		$totalSum=$totalSum+$row['price']*$row['quantity'];
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title  -->
    <title>CGXPPDK</title>

    <!-- Favicon  -->
	<link rel="icon" href="img/core-img/ologo.png">
	<link href="css/bootstrap.min1.css" rel="stylesheet">
    <link href="css/font-awesome.min1.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate1.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
	<style>
	.h2{
		font-size: 45 px;
	}
	</style>

</head>

<body>
       
     <!-- ##### Header Area Start ##### -->
	 <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="indexu.php"><img src="img/core-img/ologo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Category</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="#category" >BROWSE CATEGORY</a></li>
                                        <li><a href="shop.php">ART</a></li>
                                        <li><a href="shop.php">CANDLES </a></li>
                                        <li><a href="shoph.php">STRAW HAT</a></li>
                                        <li><a href="shopc.php">BATIK BAG</a></li>
                                        <li><a href="shop.php">ACCESSORIES</a></li>
                                        <li><a href="shop.php">CARDS</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="favourite.php"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->


                <div class="user-login-info">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/core-img/user.svg" alt=""></a>
    <div class="dropdown-menu">
        <a href="profileUser.php" class="dropdown-item">Your Profile</a>
        <a href="index.php" class="dropdown-item" onclick="logOutVal()" >Sign Out</a>
    </div>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="cart.php" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""></a>
                </div>
            </div>
            
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

	<br>
	<br>

	<section id="cart_items">
	<form>
		<div class="container">
			<br>
			<br>
			<h2> Shopping Cart </h2>
			<br>
			<br>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>

					
					<tbody>
                        
					<?php
					$user_products_result=mysqli_query($conn,$user_products_query) or die(mysqli_error($conn));
					$no_of_user_products= mysqli_num_rows($user_products_result);
					$counter=1;
					$subTotal=0;
					while($row=mysqli_fetch_array($user_products_result)){
						$subquantity = $row['quantity'] * $row['price'];
						$subTotal = $row['price'] * $row['quantity'];
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo $row["image"] ?>" alt="" style="width: 100px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $row["name"] ?></a></h4>
								<p><?php echo $row["ppdkName"] ?></p>
							</td>
							<td class="cart_price">
								<p>RM<?php echo $row["price"] ?></p>
							</td>
							<td class="cart_quantity">

							<form method="post" action="quantitycart.php?id=<?php echo $row['cartId']?>">
							
								
								<input type="submit" name="insert" value="" style="visibility: none; border-style: none;">
								<input type="submit" name="sub" Value="-" style="width: 20px; margin:5px; font-size: 20x;float:left">
								<input class="cart_quantity_input" style="width: 100px;" type="text" name="quantity" value="<?php echo $row["quantity"] ?>">
								<input type="submit" name="add" Value="+" style="width: 20px; margin:5px; font-size: 20x;">

															
							</form>		
									
									
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price">RM<?php echo $subquantity ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="delete.php?id=<?php echo $row["cartId"];?>"><i class="fa fa-times"></i></a>

							</td>
						</tr>

						<?php $counter=$counter+1;}?>
					</tbody>
				</table>
			</div>
		</div>
		</form>  
	</section> <!--/#cart_items-->

		 <!-- Cart Summary -->
		 <section id="do_action">
			<div class="container">
		 		<div class="col-sm-6">
					<div class="total_area">
				<ul>
					<li>Cart Sub Total <span>RM <?php echo $totalSum; ?></span></li>
					<li>Shipping Cost <span>Free</span></li>
					<li>Total <span>RM <?php echo $totalSum; ?></span></li>
				</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
			</div>
		</div>
	</div>
	</section>	

   <!-- ##### Footer Area Start ##### -->
   <footer class="footer_area clearfix">
	<div class="container">
		<div class="row">
			<!-- Single Widget Area -->
			<div class="col-12 col-md-6">
				<div class="single_widget_area d-flex mb-30">
					<!-- Logo -->
					<div class="footer-logo mr-50">
						<a href="#"><img src="img/core-img/ologo.png" alt=""></a>
					</div>
					<!-- Footer Menu -->
					<div class="footer_menu">
						<ul>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Single Widget Area -->
			<div class="col-12 col-md-6">
				<div class="single_widget_area mb-30">
					<ul class="footer_widget_menu">
						<li><a href="#">Order Status</a></li>
						<li><a href="#">Payment Options</a></li>
						<li><a href="#">Shipping and Delivery</a></li>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms of Use</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row align-items-end">
			<!-- Single Widget Area -->
			<div class="col-12 col-md-6">
				<div class="single_widget_area">
					<div class="footer_heading mb-30">
						<h6>Subscribe</h6>
					</div>
					<div class="subscribtion_form">
						<form action="#" method="post">
							<input type="email" name="mail" class="mail" placeholder="Your email here">
							<button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
			<!-- Single Widget Area -->
			<div class="col-12 col-md-6">
				<div class="single_widget_area">
					<div class="footer_social_area">
						<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
						<a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>


	   

<div class="row mt-5">
			<div class="col-md-12 text-center">
				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>

	</div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
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
    function logOutVal(){
        var ask = window.confirm("Are you want to sign out?");
        if (ask == true){
            window.location="signout.php";
        }else {
            return false;
        }
    }
    </script>
</body>

</html>







<?php    
    $con=mysqli_connect("localhost","root","","member") or die(mysqli_error($con));
    extract($_POST);
    
        //$image = addslashes(file_get_contents($_FILES['pdfTest']['tmp_name']));
        //$image = base64_encode(file_get_contents(addslashes($_FILES['pdfTest']['tmp_name'])));
        $image = $con->real_escape_string(file_get_contents(addslashes($_FILES['pdfTest']['tmp_name'])));
    
        $insert_query = "INSERT INTO test(image) values('{$image}')";
        $insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));
          
    header('location: member.php');
    
    ?>