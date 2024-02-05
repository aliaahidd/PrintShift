<<!--?php 
//index.php
require 'dbase.php';
$query = "SELECT * FROM orders";
$result = mysqli_query($con, $query);
$no_of_user_products= mysqli_num_rows($result);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ orderQuantity:'".$row["orderQuantity"]."', orderID:".$row["orderID"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'orderID',
 ykeys:['orderQuantity'],
 labels:['Quantity'],
 hideHover:'auto',
 stacked:true
});
</script>-->

<?php 
//index.php
require('dbase.php');
$query = "SELECT * FROM orders";
$result = mysqli_query($con, $query);
$no_of_user_products= mysqli_num_rows($result);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ orderID:'".$row["orderID"]."', orderQuantity:".$row["orderQuantity"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Graphs</title>
  
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 class="text-center">Staff's Results Chart</h2>
   <h3 class="text-center">Analyse the staff's results</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>

  <div class = "container">
  <button class = "btn btn-warning btn-sm"><a href = "ptareportMtest.php" style = "text-decoration: none; color: #333;">Back to Results</a></button>
  </div>

 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'orderID',
 ykeys:['orderQuantity'],
 labels:['orderQuantity'],
 hideHover:'auto',
 stacked:true
});
</script>