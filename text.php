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

        .column {
            float: left;
            padding: 10px;
        }

        /* Left and right column */
        .column.side {
            width: 25%;
        }
        .column.middle {
            width: 40%;
        }

        .column.side-right {
            width: 35%
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
  width: 500px;
  height: 350px;
  border: 2px solid black;
  padding: 4px 6px;
  font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif"
}

#circle {
    margin-top: 50px; 
    background-color:#fff;
    border:1px solid red;    
    height:200px;
    border-radius:50%;
    -moz-border-radius:50%;
    -webkit-border-radius:50%;
    width:200px;
}
        
    </style>
    </head>
    <?php include("header.php"); ?>

    <body>
    <div class="main">
    <div class="column side">
    <h2>Side</h2>
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
    <h2>Button Badge</h2><br>
    <h6><a href="addtext.php">Background</a> > <a href="addtext.php">Add Text</a> > <a href="addtext.php">Add Image</a></h6><br>
    
    <!--Background-->
    <div>
        <h3 style="color: #58EAC6">Background</h3>

        <div>
            <label for="colorPicker"><h6>Background color: </h6></label><br>
            <input type="color" value="#8888ff" id="colorPicker">
            <p id="output"></p>
        </div>

        <label for="bgImage"><h6>Background Image: </h6></label>
        <input type="file" id="typeFile" accept="image/png, image/jpg" class="upload">
        <br>
    </div>

    <!--Add text-->
    <div>
        <h3 style="color: #58EAC6">Add Text</h3>
        <label for="bgColor"><h6>Text Font: </h6></label><br>
        
        <link href='https://fonts.googleapis.com/css?family=Montez|Lobster|Josefin+Sans|Shadows+Into+Light|Pacifico|Amatic+SC:700|Orbitron:400,900|Rokkitt|Righteous|Dancing+Script:700|Bangers|Chewy|Sigmar+One|Architects+Daughter|Abril+Fatface|Covered+By+Your+Grace|Kaushan+Script|Gloria+Hallelujah|Satisfy|Lobster+Two:700|Comfortaa:700|Cinzel|Courgette' rel='stylesheet' type='text/css'>

	    <div id = "text">
        <select id = 'select' onChange = "return fontChange();">
	    </select>
		    <h4 id = "h4">Grumpy wizards</h4>
        <div id = "standard">Grumpy wizards</div>
        <br>
        </div>
        <label for="bgImage"><h6>Text Color: </h6></label><br>
        <input type="color" name="colorFont">
	</div>
</div>     
    </div>
    <!--Image Preview-->
  <div class="column side-right">
    <h2>Image Preview</h2>
    <p>Button badge</p>

    <div id="box">
        <center>
            <div id="circle"><p id="output">
                <div class="myTarget" style="resize: both; overflow: hidden;"></div>
            </div></center>      
    </div>
        <input type="submit" value="Confirm">
  </div>

</body>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
    <?php include("footer.php"); ?>
</div>
<script>
var fonts = ["Montez","Lobster","Josefin Sans","Shadows Into Light","Pacifico","Amatic SC", "Orbitron", "Rokkitt","Righteous","Dancing Script","Bangers","Chewy","Sigmar One","Architects Daughter","Abril Fatface","Covered By Your Grace","Kaushan Script","Gloria Hallelujah","Satisfy","Lobster Two","Comfortaa","Cinzel","Courgette"];
var string = "";
var select = document.getElementById("select")
for(var a = 0; a < fonts.length ; a++){
	var opt = document.createElement('option');
	opt.value = opt.innerHTML = fonts[a];
	opt.style.fontFamily = fonts[a];
	select.add(opt);
}
function fontChange(){
	var x = document.getElementById("select").selectedIndex;
  var y = document.getElementById("select").options;
	document.body.insertAdjacentHTML("beforeend", "<style> #text{ font-family:'"+y[x].text+"';}"+
																	 "#select{font-family:'"+y[x].text+"';</style>");
	var tl = new TimelineLite, 
	mySplitText = new SplitText("#h1", {type:"words,chars"}), 
	chars = mySplitText.chars; //an array of all the divs that wrap each character
	TweenLite.set("#h1", {perspective:400});
	tl.staggerFrom(chars, 0.2, {opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 50% -50",  ease:Back.easeOut}, 0.01, "+=0");
	var t2 = new TimelineLite, 
	mySplitText2 = new SplitText("#h2", {type:"words,chars"}), 
	chars = mySplitText2.chars; //an array of all the divs that wrap each character
	TweenLite.set("#h2", {perspective:400});
	t2.staggerFrom(chars, 0.2, {opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 100% -50",  ease:Back.easeOut}, 0.01, "+=0");
	var t3 = new TimelineLite, 
	mySplitText3 = new SplitText("#h3", {type:"words,chars"}), 
	chars = mySplitText3.chars; //an array of all the divs that wrap each character
	TweenLite.set("#h3", {perspective:400});
	t3.staggerFrom(chars, 0.2, {opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 150% -50",  ease:Back.easeOut}, 0.01, "+=0");
	var t4 = new TimelineLite, 
	mySplitText4 = new SplitText("#h4", {type:"words,chars"}), 
	chars = mySplitText4.chars; //an array of all the divs that wrap each character
	TweenLite.set("#h4", {perspective:400});
	t4.staggerFrom(chars, 0.2, {opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 200% -50",  ease:Back.easeOut}, 0.01, "+=0");
	var t5 = new TimelineLite, 
	mySplitText5 = new SplitText("#standard", {type:"words,chars"}), 
	chars = mySplitText5.chars; //an array of all the divs that wrap each character
	TweenLite.set("#standard", {perspective:400});
	t5.staggerFrom(chars, 0.2, {opacity:0, scale:0, y:80, rotationX:180, transformOrigin:"0% 250% -50",  ease:Back.easeOut}, 0.01, "+=0");
}
TweenLite.to(page, 0, {top:"-100vh", ease:Bounce.easeOut, delay:0});
TweenLite.to(page, 1, {top:"0vh", ease:Elastic.easeOut, delay:1});
fontChange();
</script>
<script>

//script for colour
let colorPicker = document.getElementById("colorPicker");
let circle = document.getElementById("circle");
let output = document.getElementById("output");

circle.style.borderColor = colorPicker.value;

colorPicker.addEventListener("input", function(event) {
  circle.style.borderColor = event.target.value;
  circle.style.backgroundColor = event.target.value;
}, false);

colorPicker.addEventListener("change", function(event) {
  output.innerText = "Color set to " + colorPicker.value + ".";
}, false);
</script>

<script>
//script for upload
$(document).ready(function(){

$('input.upload').on('change', addFile);

});

function addFile (event) {

   var jqDisplay = $('div.myTarget');
   var reader = new FileReader();
   var selectedFile = event.target.files[0];

   reader.onload = function (event) {
       var imageSrc = event.target.result;
       jqDisplay.html('<img src="' + imageSrc + '" alt="uploaded Image">');
   };
  reader.readAsDataURL(selectedFile); 
}
</script>
</html>