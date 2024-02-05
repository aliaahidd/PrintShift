<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Confirm Design</title>
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
            width: 40%;
        }

        .column.side-right {
            width: 45%
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
th, td {
  padding: 15px;
  text-align: left;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
        
    </style>
    </head>
    <?php include("header.php"); ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--> 
<body>
    
<div class="main">
    <div class="column side">
    <h2>Products</h2>
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
  <?php if ($proId == 1){?>
        <h2>Button badge<h2>
        <h4>RM5.00/pcs<h4><br>
    <?php } else if ($proId == 2) {?>
        <h2>Keychain<h2>
        <h4>RM7.00/pcs<h4><br>
    <?php } else if ($proId == 3) {?>
        <h2>T-shirt<h2>
        <h4>RM20.00/pcs<h4><br>
    <?php } else if ($proId == 4) {?>
        <h2>Bag<h2>
    <h4>RM30.00/pcs<h4><br><?php } ?>
    <div id="box">
        <center>
            <div id=""><br><img id="display" src="profImage/no-image.png" width="300px" height="300px;">
                <div class="myTarget" ></div>
            </div></center>      
    </div>
    

  </div>
</div>     
    <!--Image Preview-->

    <?php $proId = $_GET['proId'];   ?>
    <?php if ($proId == 1 || $proId == 2) {?>
  <div class="column side-right">

  <form method="post" action="cart_add.php?proId=<?php echo $proId ?>" enctype="multipart/form-data">
  <table>
      <tr>
          <td><h5>Upload:</h5></td>
        <td><input type="file" accept="image/*" name="image" onchange="readURL(this)" class=""></td>
      </tr>
        <tr>
            <td><h5>Quantity       : </td>
            <td><input type="text" name="productQuantity" id="productQuantity" placeholder="Quantity" required></td></h5>
        </tr>
        <tr>
            <td><h5>Size : </td>
            <td><p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="44x44">44mm x 44mm</p>
            <p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="58x58">58mm x 58mm</p><td></h5>
            <input type="hidden" name="productColour" value="Default">
        </tr>
        <tr>
            <td></td><td style="text-align: right;"><input type="submit" value="Add To Cart" name="dsgnBtn" class="btn btn-primary"></td>
        </tr>
        <!--<label id="choiceLabel"></label>-->
        <br><br><br><br><br><br><br>
    </table>
      </form>   
    </div><?php } else if ($proId == 3) {?>
        
<div class="column side-right">

  <form method="post" action="cart_add.php?proId=<?php echo $proId ?>" enctype="multipart/form-data">
  <table>
  <tr>
        <td><a href="" data-toggle="modal" id="preview-image">Size chart</a></td></tr>
      <tr>
          <td><h5>Upload:</h5></td>
        <td><input type="file" accept="image/*" name="image" onchange="readURL(this)" class=""></td>
      </tr>
        <tr>
            <td><h5>Quantity       : </td>
            <td><input type="text" name="productQuantity" id="productQuantity" placeholder="Quantity" required></td></h5>
        </tr>
        <tr>
            <td><h5>Size : </td>
            <td><p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="XS"> XS &emsp;
            <input type="radio" name="productSize" id="productSize" value="S"> S &emsp;
            <input type="radio" name="productSize" id="productSize" value="M"> M   </p>
            <p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="M"> L &emsp;&ensp;
            <input type="radio" name="productSize" id="productSize" value="M"> XL &emsp;</p></td></h5>
        </tr>
        <tr>
            <td><h5>Colour : </td>
            <td><p style="font-size: 20px;"><input type="radio" name="productColour" id="productColour" value="White"> White &emsp;
            <input type="radio" name="productColour" id="productColour" value="Black"> Black &emsp; </p>
            <p style="font-size: 20px;"><input type="radio" name="productColour" id="productColour" value="Green"> Green &emsp;
            <input type="radio" name="productColour" id="productColour" value="Blue"> Blue &emsp; </p></td></h5>
        </tr>
        <tr>
            <td></td><td style="text-align: right;"><input type="submit" value="Add To Cart" name="dsgnBtn" class="btn btn-primary"></td>
        </tr>
        <!--<label id="choiceLabel"></label>-->
        <br><br><br><br>
    </table>
      </form>  
      <div id="myModal" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
    <center><img src="image/size-chart.jpg"></div></center>
  </div> 
    </div>
    <?php } else { ?>
        <div class="column side-right">

  <form method="post" action="cart_add.php?proId=<?php echo $proId ?>" enctype="multipart/form-data">
  <table>
      <tr>
          <td><h5>Upload:</h5></td>
        <td><input type="file" accept="image/*" name="image" onchange="readURL(this)" class=""></td>
      </tr>
        <tr>
            <td><h5>Quantity       : </td>
            <td><input type="text" name="productQuantity" id="productQuantity" placeholder="Quantity" required></td></h5>
        </tr>
        <tr>
            <td><h5>Size : </td>
            <td><p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="S"> S &emsp;
            <input type="radio" name="productSize" id="productSize" value="M"> M   </p>
            <p style="font-size: 20px;"><input type="radio" name="productSize" id="productSize" value="M"> L &emsp;&ensp;</p></td></h5>
        </tr>
        <tr>
            <td><h5>Colour : </td>
            <td><p style="font-size: 20px;"><input type="radio" name="productColour" id="productColour" value="White"> White &emsp;
            <input type="radio" name="productColour" id="productColour" value="Black"> Black   </p></td></h5>
        </tr>
        <tr>
            <td></td><td style="text-align: right;"><input type="submit" value="Add To Cart" name="dsgnBtn" class="btn btn-primary"></td>
        </tr>
        <!--<label id="choiceLabel"></label>-->
        <br><br><br><br><br><br><br>
    </table>
      </form>   
    </div><?php } ?>

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
    <?php include("footer.php"); ?>
</div>

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
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("preview-image");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</html>