<?php
session_start();           
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

        .navbar {
            border-radius: 0px;
        }
        
        button{
            padding: 40px;
            width: 70%;
            font-size: 20px;
        }
        input[type=submit]{
            background-color: rgb(3, 215, 190);
            width: 60%;
            font-size: 36px;
            padding: 16px;
            cursor: pointer;
            border: none;
            border-color: black;
        }
        /* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

.row {
  margin: 8px -16px;
  margin: auto;

}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 100%;
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
    </head>
    <?php include("header.php"); ?>
    <br>
    <!--<hr style="height: 2px; width: 60%; border-color:black;">-->
    <div class="main">
      <h4 style="text-align: center;">Which one you want to do?</h4>
      <hr style="width: 10%; height: 2px; background: gray;">

           <div class="row">

            <?php
            include("dbase.php");
            $proId = $_GET['id'];   
            ?>
            <div class="column">
                    <div class="content">
                    <a href="btnDesign.php?proId=<?php echo $proId ?>">
                    <center><img src="image/designicon.png" alt="" style="height:150px;" class="center"></center></a><br>
                    <h5 style="text-align: center;">Customize your own design</h5>
                    </div></div>        

            <div class="column">
                    <div class="content">
                    <a href="allDesign.php?proId=<?php echo $proId ?>">
                    <center><img src="image/readyicon.png" alt="" style="height:150px;" class="center"></center></a><br>
                    <h5 style="text-align: center;">Choose readymade design</h5>
                    </div></div>

                    
           </div>
           <br>
           <br>
           <br>
           <br>
           
    </div>
    <?php include('footer.php'); ?>
</html>