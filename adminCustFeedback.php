<?php
    session_start();
    require 'dbase.php';

    $limit = 5;  
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;  
    
    $user_products_query="SELECT * from feedback order by feedbackID desc limit $start_from, $limit";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);

    $query_confirm = "Select * from orders where orderStatus = 'Pending'";
    $query_result = mysqli_query($con,$query_confirm) or die(mysqli_error($con));
    $no_admin_confirm = mysqli_num_rows($query_result);

    $query_confirm_history = "Select * from orders where orderStatus = 'Confirmed' or orderStatus = 'Received' or orderStatus = 'Rated'";
    $query_result_history = mysqli_query($con,$query_confirm_history) or die(mysqli_error($con));
    $no_admin_confirm_history = mysqli_num_rows($query_result_history);

    
    $sum=0;
    $totalSum=0;
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
            width: 50%;
        }

        .column.side-right {
            width: 35%
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


        .btn-primary{
            background-color: #3CB371;
            border-color:#3CB371;
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
            <p><a href = "adminindex.php" >Order Pending</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $no_admin_confirm ?></span></p>
            <p><a href = "adminOrdConf.php" >Order Confirm</a> <span style="background-color:#00A693; padding: 2px 5px; color: white;"><?php echo $no_admin_confirm_history ?></span></p>
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
    <h2>Feedback</h2>
    <h4>Feedback Customer</h4><br>
    
    <table>
        <tr>
            <th>Feedback ID</th>
            <th>Customer ID</th>
            <th>Order ID</th>
            <th>Star Rating</th>
            <th>Comments</th>
        </tr>

        <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        //$counter=1;
                        $subTotal = 0;
                       while($row=mysqli_fetch_array($user_products_result)){
                         ?>
        <tr>
           
            <td><?php echo $row['feedbackID']?></td>
            <td><?php echo $row['userID'];  ?></td>
            <td><?php echo $row['orderID'];  ?></td>
            <td><?php echo $row['feedbackStar'];  ?></td>
            <td><?php echo $row['feedbackComment'];  ?></td>
        </tr>
        
        <?php } ?>
    </table>

    <?php  

$sql = "SELECT COUNT(feedbackID) FROM feedback";  
$rs_result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) { 
            $pagLink .= "<a href='adminCustFeedback.php?page=".$i."'>".$i."</a>";  
};  
echo $pagLink . "</div>";  
?>
    </div>

<div class="column side-right">
<br><br><br>

<!--<div id="resizable" style="height: 370px;border:1px solid gray;">
	<div id="chartContainer1" style="height: 100%; width: 100%;"></div>
</div>-->

<div id="barchart_material" style="width: 500px; height: 500px;"></div>



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
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.canvasjs-chart-credit{
    position: static;
}
</style>
    
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


<?php 
$selectfivestar = "SELECT feedbackStar from feedback where feedbackStar = '5'";
$resultfivestar = mysqli_query($con, $selectfivestar);
$countfivestar = mysqli_num_rows($resultfivestar);

$selectfourstar = "SELECT feedbackStar from feedback where feedbackStar = '4'";
$resultfourstar = mysqli_query($con, $selectfourstar);
$countfourstar = mysqli_num_rows($resultfourstar);

$selectthreestar = "SELECT feedbackStar from feedback where feedbackStar = '3'";
$resultthreestar = mysqli_query($con, $selectthreestar);
$countthreestar = mysqli_num_rows($resultthreestar);

$selecttwostar = "SELECT feedbackStar from feedback where feedbackStar = '2'";
$resulttwostar = mysqli_query($con, $selecttwostar);
$counttwostar = mysqli_num_rows($resulttwostar);

$selectonestar = "SELECT feedbackStar from feedback where feedbackStar = '1'";
$resultonestar = mysqli_query($con, $selectonestar);
$countonestar = mysqli_num_rows($resultonestar);

$selectzerostar = "SELECT feedbackStar from feedback where feedbackStar = '0'";
$resultzerostar = mysqli_query($con, $selectzerostar);
$countzerostar = mysqli_num_rows($resultzerostar);
?>

<!--script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
<script>
window.onload = function () {

// Construct options first and then pass it as a parameter
var options1 = {
	animationEnabled: true,
	title: {
		text: "User Feedback Chart"
	},
	data: [{
		type: "bar", //change it to line, area, bar, pie, etc
		legendText: "Try Resizing with the handle to the bottom right",
		//showInLegend: true,
		dataPoints: [
			{ y: <?php echo $countzerostar ?> },
			{ y: <?php echo $countonestar ?> },
			{ y: <?php echo $counttwostar ?> },
			{ y: <?php echo $countthreestar ?> },
			{ y: <?php echo $countfourstar ?> },
			{ y: <?php echo $countfivestar ?> },

			]
		}]
};

$("#resizable").resizable({
	create: function (event, ui) {
		//Create chart.
		$("#chartContainer1").CanvasJSChart(options1);
	},
	resize: function (event, ui) {
		//Update chart size according to its container size.
		$("#chartContainer1").CanvasJSChart().render();
	}
});

}-->

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Star', 'Customer', { role: 'style' }],
          ['5', <?php echo $countfivestar ?>, 'color: #b87333'],
          ['4', <?php echo $countfourstar ?>, 'silver'],
          ['3', <?php echo $countthreestar ?>, 'blue'],
          ['2', <?php echo $counttwostar ?>, 'red'],
          ['1', <?php echo $countonestar ?>, 'pink'],
          ['0', <?php echo $countzerostar ?>, 'magenta'],
        ]);

        var options = {
          chart: {
            title: 'User Rating Chart',
            subtitle: 'Customer Feedback Star',
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          colors: ['#00A693'],
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


</html>