<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Home</title>
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
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
  body{
    background: whitesmoke;  
  }

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
</style>
<!--internal css-->
  <?php
    include('header.php');
    include('ads.php');
  ?>
    <body>
          <div class="main">
               <center><br>
               <h3>4 Steps to design</h3><hr style="width: 10%; height: 2px; background: gray; ">
               <img src="image/stepdesign.JPG.png" style="width: 100%;">
                </center>
                <hr>
           </div>
           
          <div class="main">
          <center><h3 id="products">Our Products</h3><hr style="width: 10%; height: 2px; background: gray;"></center>
           <div class="row">
           <?php
           include("dbase.php");  
                $query = "SELECT * FROM product ORDER BY productID ASC";  
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {
                         $productID = $row["productID"];
                         $productName = $row["productName"];
                         $productImage = $row['productImage'];
                ?>
          <?php if(!isset($_SESSION['users_userID'])){  ?>
                <div class="column">
                    <div class="content">
                    <a href="login.php">
                    <?php echo '<img src="data:image;base64,'.base64_encode( $row['productImage'] ).'" id="" style="height: 150px;" class="center">'?></a><br>
                    <h5 style="text-align: center;"><?php echo $row["productName"]; ?></h5>
                    </div></div>
          <?php } else { ?>
            <div class="column">
                    <div class="content">
                    <a href="btnChoose.php?id=<?php echo $productID ?>">
                    <?php echo '<img src="data:image;base64,'.base64_encode( $row['productImage'] ).'" id="" style="height: 150px;" class="center">'?></a><br>
                    <h5 style="text-align: center;"><?php echo $row["productName"]; ?></h5>
                    </div></div><?php }}} ?>
            </div><hr>
           </div>
    <?php include('footer.php')?>

    <!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>