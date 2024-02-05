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

        .column {
            float: left;
            padding: 10px;
        }

        /* Left and right column */
        .column.side {
            width: 15%;
        }
        .column.middle {
            width: 55%;
        }

        .column.side-right {
            width: 25%
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

/* Content */
.content {
  background-color: whitesmoke;
  padding: 10px;
}
        
    </style>
    </head>
    <?php include("header.php"); ?>

    <body>
    
    <div class="main">
    <div class="column side">
    <h2>Products</h2>
    <hr>
    <?php
    include("dbase.php");  
        $query = "SELECT * FROM product";  
        $result = mysqli_query($con, $query);  
            if(mysqli_num_rows($result) > 0)  
                {  
            while($row = mysqli_fetch_array($result))  
                {
                $productID = $row["productID"];
                $productName = $row["productName"];
                $productLink = $row["productLink"];           
    ?>
    <ul>
        <li><p><a href ="<?php echo $row["productLink"]; ?>"><?php echo $row["productName"]; ?></a></p></li>
    </ul>
    <?php }} ?>
  </div>

  <div class="column middle">
    <h2>Readymade Design</h2><br>
    <h4>Readymade > Occasions</h4><br>
    <div class="main">
           <div class="row">
           
           <?php
            include("dbase.php");  
            $query = "SELECT * FROM readymade WHERE readymadeClass = 'Occasions'";  
            $result = mysqli_query($con, $query);  
            if(mysqli_num_rows($result) > 0)  
                {  
            while($row = mysqli_fetch_array($result))  
                {
                $readymadeID = $row["readymadeID"];
                $readymadeName = $row["readymadeName"];
                $readymadeImage = $row["readymadeImage"];           
            ?>
           <div class="column">
                    <div class="content">
                    <center><img src="<?php echo $row["readymadeImage"] ?>" id="readymadeDesign" style="height:100px;" class="ImageRM" onclick="imageFunction(this)"></center></a><br>
                    <h5 style="text-align: center;"><?php echo $row["readymadeName"]?></h5>
                    </div></div>
                    <?php }} ?>                  
           </div>
    </div>

</div>     
    </div>
    <!--Image Preview-->
  <div class="column side-right">
    <h2>Image Preview</h2>
    <p>Button badge</p>

    <div id="box">
        <center>
            <div><img src="image/preview.png" style="height: 300px; padding-top: 20px;" id="previewImage" class="preview"></div>
            </center></div>      
    <div>
        <form method="POST" action="confirmation.php?id=<?php echo $row["readymadeID"]; ?>">
        <input type="submit" value="Confirm">
    </form>
  </div>
</body>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script>
const thumbs=document.querySelector("#readymadeDesign").children;

function imageFunction(event){
    document.getElementById('previewImage').src=document.getElementById('readymadeDesign')

for(let i=0; i<thumbs.length;i++){
  thumbs[i].classList.remove("active");
}
event.classList.add("active");
}
</script>
</html>