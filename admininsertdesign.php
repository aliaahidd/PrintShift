<?php
    session_start();
    require 'dbase.php';

    $query_pending="SELECT * from orders where orderStatus = 'Pending'";
    $query_pending_result=mysqli_query($con,$query_pending) or die(mysqli_error($con));
    $no_admin_pending= mysqli_num_rows($query_pending_result);

    $query_confirm = "Select * from orders where orderStatus = 'Confirmed' or orderStatus = 'Received' or orderStatus = 'Rated'";
    $query_result = mysqli_query($con,$query_confirm) or die(mysqli_error($con));
    $no_admin_confirm = mysqli_num_rows($query_result);

    $user_products_query="SELECT * FROM readymade";
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
            width: 45%;
        }

        .column.side-right {
            width: 40%
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
            text-align: left;
        }
        
        img{
            width: 100px;
        }

        #box {
            width: 500px;
            height: 350px;
            border: 1px solid black;
            padding: 4px 6px;
            font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif"
        }
        #circle {
            margin-top: 20px; 
            background-color:#fff;
            border:1px solid black;    
            height:300px;
            border-radius:50%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            width:300px;
        }

        .btn {
            background-color:  #00A693;
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
    <h2>Design</h2>
    <h4>Insert Design</h4><br>
    
    <form method="post" action="admininsertphp.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><p>Readymade Category</p></td>
                    <td><select style="padding:5px;" id="readyCategory" name="category" class="form-control" >
                    <option value="Occasions">Occasions</option>
                    <option value="Quotes">Quotes</option>
                    <option value="Logo">Logo</option>
                    </select></td>
                </tr>
                <tr>
                <td><p>Readymade Type</p></td>
                    <td><input type="text" name="readymadeType" class="form-control" placeholder="Birthday, Quotes, Background etc.."></td>
                </tr>
                <tr>
                    <td><p>Readymade Name</p></td>
                    <td><input type="text" name="readymadeName" class="form-control" placeholder="Birthday Girl 12 years, Quotes about life etc.."></td>
                </tr>
                <tr>
                    <td><p>Readymade Description</p></td>
                    <td><input type="text" name="readymadeDesc" class="form-control" placeholder="For girl, life is simple etc.."></td>
                </tr>
                <tr>
                    <td>Readymade Image</td>
                    <td>
                        <input type="file" accept="image/*" name="image" onchange="readURL(this)" class="form-control">
                    </td>
                </tr>
            </table>
            


    
  </div>

  <div class="column side-right">
    <h2>Image Preview</h2>
    <br><br>
    <div id="box">
        <center>
            <div id=""><br><img id="display" src="profImage/no-image.png" style="width: 300px; height: 300px">
                <div class="myTarget" ></div>
            </div></center>      
    </div>
  </div>
  <input type="submit" value="Insert" style="position: absolute; right: 120px; top:550px" class="btn btn-primary">
  </div>
  </form>
</body>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#display')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
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