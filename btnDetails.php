<?php
session_start();
if(!empty($_POST)){     
$_SESSION["sizeRadio"]=$_POST["sizeRadio"];
$_SESSION["quantity"]=$_POST["quantity"];   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>Button Details</title>
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
            width: 25%;
        }
        .column.middle {
            width: 25%;
        }

        .column.side-right {
            width: 50%
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

        .img-zoom-container {
            position: relative;
        }

        .img-zoom-lens {
            position: absolute;
            border: 1px solid #d4d4d4;
            /*set the size of the lens:*/
            width: 40px;
            height: 40px;
        }

        .img-zoom-result {
            border: 1px solid #d4d4d4;
            /*set the size of the result div:*/
             width: 300px;
            height: 300px;
        }

        input[type=radio] {
            width: 20px;
            height: 20px;
        }

        label{
            font-size: 20px;
        }

        input[type=submit] {
            padding: 10px;
        }

        hr{
            border: 1px solid gray;
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

<form method="POST" action="choose.php">
<?php
include("dbase.php");  
    $query = "SELECT * FROM product where productID = 1";  
    $result = mysqli_query($con, $query);  
        if(mysqli_num_rows($result) > 0)  
            {  
        while($row = mysqli_fetch_array($result))  
            {
            $productID = $row["productID"];
            $productName = $row["productName"];
            $productPrice = $row["productPrice"];
            $productImage = $row["productImage"];
            $productLink = $row["productLink"];
            
?>
  <div class="column middle">
    <h2><?php echo $row["productName"]; ?></h2>
    <h4>RM <?php echo $row["productPrice"]; ?></h4><br>

    <div class = "form-check">
    <label for="sizeBtn">Size: </label><br>
    <p style="font-size: 20px;"><input type="radio" name="sizeRadio" value="44x44">44mm x 44mm</p>
    <p style="font-size: 20px;"><input type="radio" name="sizeRadio" value="58x58">58mm x 58mm</p><br>
    <label id="choiceLabel"></label>
    </div>
    <br>

    <label for=quantity>Quantity: </label><br>
    <input type="text" name="quantity" placeholder="Quantity" required>
    
  </div>
  
  <div class="column side-right">
    <h2>Image Preview</h2>
    <p>Button badge</p>

    <div class="column img-zoom-container">
        <img src="<?php echo $row["productImage"]; ?>" id="myimage" width="300" height="240" style="background-color:whitesmoke;">
    </div>
    <div class="column img-zoom-container">
        <div id="myresult" class="img-zoom-result"></div><br>
        <input type="submit" value="Confirm">
    </div>
  </div>

  <?php }} ?>
</form>
</body>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
    <?php include("footer.php"); ?>
</div>

<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;
  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
// Initiate zoom effect:
imageZoom("myimage", "myresult");

//radio button
(function (){
    var radios = document.getElementsByName('sizeRadio');
    console.log(radios);
    for(var i = 0; i < radios.length; i++){
        radios[i].onclick = function(){
            document.getElementById('choiceLabel').innerText = this.value;
        }
    }
})();
</script>

</html>