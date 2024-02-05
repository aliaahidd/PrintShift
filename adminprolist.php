<?php
    session_start();
    require 'dbase.php';

    $query_pending="SELECT * from orders where orderStatus = 'Pending'";
    $query_pending_result=mysqli_query($con,$query_pending) or die(mysqli_error($con));
    $no_admin_pending= mysqli_num_rows($query_pending_result);

    $query_confirm = "Select * from orders where orderStatus = 'Confirmed' or orderStatus = 'Received' or orderStatus = 'Rated'";
    $query_result = mysqli_query($con,$query_confirm) or die(mysqli_error($con));
    $no_admin_confirm = mysqli_num_rows($query_result);

    $user_products_query="SELECT * FROM product";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    ?>
    <?php
    }else{
        while($row=mysqli_fetch_array($user_products_result)){
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Admin</title>
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
            width: 75%;
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

        #status{
            border-collapse: collapse;
            border-color: black;
            width: 100%;
            padding: 15px;
        }

        th, td {
            padding:25px;
            text-align: center;
        }
        table, th, td {
            border-bottom: 1px solid black;
        }
        img{
            width: 100px;
        }

    </style>
    </head>
    <nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                       <a href="adminindex.php" class="navbar-brand"><img src="image/logoPS.png" style="width: 150px; " alt=""></a>
                   </div>
                   
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           
                       </ul>
                   </div>
               </div>
</nav>

    <body>
    <div class="main">
    <div class="column side">
            <h6>Order</h6>
        <hr>
            <p><a href = "adminindex.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $no_admin_pending ?></span></p>
            <p><a href = "adminOrdConf.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $no_admin_confirm ?></span></p>
        <hr>
            <h6>Feedback</h6>
        <hr>
            <p><a href = "adminCustFeedback.php">Customer Feedback</a></p>
        <hr>
            <h6>Design</h6>
        <hr>
            <p><a href = "admindesignlist.php" >Design List</a></p>
            <p><a href = "admininsertdesign.php" >Insert Design</a></p>
        <hr>
            <h6>Product</h6>
        <hr>
            <p><a href = "adminprolist.php" >Product List</a></p>
        <hr>
            <a href="logout.php" id="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </div>

  <div class="column middle">
    <h2>Product</h2>
    <h4>Product List</h4><br>
    
    <table>
        <tr>
            <th>No.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Type</th>
            <th>Product Name</th>
        </tr>

        <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        //$counter=1;
                        $subTotal = 0;
                       while($row=mysqli_fetch_array($user_products_result)){  
                         ?>
        <tr>
            <form action="adminConfirm.php" method="POST">
            <td><?php echo $row['productID']?></td>
            <td><?php echo '<img src="data:image;base64,'.base64_encode( $row['productImage'] ).'" id="">'?></td>
            <td><?php echo $row['productName'];  ?></td>
            <td>RM<?php echo $row['productPrice'];  ?></td>
            <td><?php echo $row['productSize'];  ?></td>
            <td><?php echo $row['productColour'];  ?></td>

        </tr>
        
        <?php } ?>
    </table>
    
    </form>

    
  </div>
  </div>
    </body>
    <script>
$(function(){
    $('a#logout').click(function(){
        if(confirm('Are you sure to logout')) {
            return true;
        }

        return false;
    });
});
</script>


</html>