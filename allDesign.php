 
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Readymade Design</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
            padding: 20px;
            text-align: center;
            background: #192D41;
            margin-top: 20px;
        }

        label{
            font-size: 20px;
        }

        input[type=submit] {
            padding: 5px;
        }

        hr{
            border: 1px solid gray;
        }

        select{
            padding: 5px;
            width: 150px;
            font-size:20px;
        }
#page{
	height: 100vh;
	width: 100vw;
	position: absolute;
	display: -webkit-flex;
    display: flex;
	text-align: center;
}
#container{
	width: 100vw;
	-webkit-align-self: center;
  align-self: center;
}

#box {
  width: 400px;
  height: 350px;
  border: 2px solid black;
  padding: 4px 6px;
  font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif"
}

.btn{
    width: 130px;
    background-color: #00A693;
}

/* Content */
.content {
  background-color: whitesmoke;
  padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#myInput {
  background-image: url('image/icons/search.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 90%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
        
    </style>
    </head>
    <?php include("header.php"); ?>

    <body>
    
    <div class="main">
    <div class="column side">
    <h2>Design</h2>
    <hr>
    <?php
    include("dbase.php");
    $proId = $_GET['proId'];
        //all
        $query = "SELECT * FROM readymade" ;  
        $result = mysqli_query($con, $query);  
        $countAll = mysqli_num_rows($result);
        //occasions
        $queryOcca = "SELECT * FROM readymade where readymadeClass = 'Occasions'" ;  
        $resultOcca = mysqli_query($con, $queryOcca);  
        $countOccasions = mysqli_num_rows($resultOcca);
        //quotes
        $queryQuotes = "SELECT * FROM readymade where readymadeClass = 'Quotes'" ;  
        $resultQuotes = mysqli_query($con, $queryQuotes);  
        $countQuotes = mysqli_num_rows($resultQuotes);
        //logo
        $queryLogo = "SELECT * FROM readymade where readymadeClass = 'Logo'" ;  
        $resultLogo = mysqli_query($con, $queryLogo);  
        $countLogo = mysqli_num_rows($resultLogo);
        

    ?>
    <ul>
        <li><p><a href ="allDesign.php?proId=<?php echo $proId ?>">All (<?php echo $countAll ?>)</a></p></li>
        <li><p><a href ="occasionsDesign.php?proId=<?php echo $proId ?>">Occasions (<?php echo $countOccasions ?>)</a></p></li>
        <li><p><a href ="quotesDesign.php?proId=<?php echo $proId ?>">Quotes (<?php echo $countQuotes ?>)</a></p></li>
        <li><p><a href ="logoDesign.php?proId=<?php echo $proId ?>">Logo (<?php echo $countLogo ?>)</a></p></li>
    </ul>

  </div>

  <div class="column middle">
    <h2>Readymade Design</h2><br>
    <div class="main">
    <input type="text" id="myInput" placeholder=" Search for readymade design.." title="Type to search">
           <div class="row">
           
           <?php
            include("dbase.php");
            
            $proId = $_GET['proId'];
            $limit = 10;  
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $start_from = ($page-1) * $limit;  
  
            $sql = "SELECT * FROM readymade LIMIT $start_from, $limit";  
            $rs_result = mysqli_query($con, $sql);  

            if(mysqli_num_rows($rs_result) > 0){
            while ($row = mysqli_fetch_array($rs_result)) { 

                $readymadeID = $row["readymadeID"];
                $readymadeName = $row["readymadeName"];
                $readymadeImage = $row["readymadeImage"];           
            ?>
           <div class="column rm" id="">
               <form method="post" id="myForm" action="confirmation.php?id=<?php echo $row["readymadeID"] ?>&proId=<?php echo $proId ?>">
                    <div class="content <?php echo $row["readymadeType"]?>">
                    <center><?php echo '<img src="data:image;base64,'.base64_encode( $row['readymadeImage'] ).'" id="" style="height:150px; width:150px;" class="ImageRM">'?></center></a><br>
                    <h5 style="text-align: center;"><?php echo $row["readymadeName"]?></h5><br>
                    <center><input type="submit" value="Choose" class="btn btn-primary" title="Click to choose"></center> 
                    </div></form></div>
                    <?php }} else { echo "0 results"; } ?>              
           </div>

           <?php  

$sql = "SELECT COUNT(readymadeID) FROM readymade";  
$rs_result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) { 
            $pagLink .= "<a href='alldesign.php?page=".$i."&proId=". $proId ."'>".$i."</a>";  
};  
echo $pagLink . "</div>";  
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
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
</div>     
    </div>
    <!--Image Preview
  <div class="column side-right">
    <h2>Image Preview</h2>
    <p>Button badge</p>

    <div>
    <form method="POST" action="confirmation.php?id=">
    <div id="box">
        <center>
            <div style="height: 300px; padding-top: 20px;" id="previewImage" name="preview"></div>
            </center></div>      
    
        <input type="submit" value="Confirm">
    </form>
    
  </div>
  </div>-->
</body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!--<script>
    function imageFunction(){
        var imageID = document.getElementById('<?php echo $row["readymadeID"]?>');
        var previewImg = document.getElementById('previewImage');

        previewImg.src = imageID.src;
        return imageFunction();
    }

</script>-->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".rm").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    }).css("visibility","none");
  });
});
</script>

</html>