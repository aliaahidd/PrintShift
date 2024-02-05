<?php
session_start();           
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="img/favicon.png" rel="shortcut icon"/>
        <title>PrintShift | Button Design</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/interactjs@1.3.3/dist/interact.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="js/html2canvas.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Nosifer|League+Script|Yellowtail|Permanent+Marker|Codystar|Eater|Molle:400italic|Snowburst+One|Shojumaru|Frijole|Gloria+Hallelujah|Calligraffitti|Tangerine|Monofett|Monoton|Arbutus|Chewy|Playball|Black+Ops+One|Rock+Salt|Pinyon+Script|Orbitron|Sacramento|Sancreek|Kranky|UnifrakturMaguntia|Creepster|Pirata+One|Seaweed+Script|Miltonian|Herr+Von+Muellerhoff|Rye|Jacques+Francois+Shadow|Montserrat+Subrayada|Akronim|Faster+One|Megrim|Cedarville+Cursive|Ewert|Plaster' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css2/font-awesome.min.css"/>
	    <link rel="stylesheet" href="css2/flaticon.css"/>
	    <link rel="stylesheet" href="css2/slicknav.min.css"/>
	    <link rel="stylesheet" href="css2/jquery-ui.min.css"/>
	    <link rel="stylesheet" href="css2/owl.carousel.min.css"/>
	    <link rel="stylesheet" href="css2/animate.css"/>
      <link rel="stylesheet" href="css2/style.css"/>

      <!-- DESIGN ONLYYYYYYYYYYYYYYYYYYYYYYYY -->


        <link href="css/design/api.css" rel="stylesheet">
        <link href="css/design/normalize.css" rel="stylesheet">

        
        <style>
        span.glyphicon {
          font-size: 15px;
        }
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

        hr{
            border: 1px solid gray;
        }

        select{
            padding: 5px;
            width: 250px;
            font-size:20px;
        }
        .btn{
            background-color: #00A693;
        }

        .btn-primary {
            background-color: #00A693;
            border-color: #00A693;
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

.resize-drag {
  color: white;
  font-size: 15px;
  font-family: sans-serif;
  padding: 1px;
  margin: 30px 30px;
  width: 220px;
  box-sizing: border-box;
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

  <!-- hoh-->
<style>

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  height: 400px;
}

textarea{
  overflow: auto;
}

.front_print{
  height: 300px;
  width: 300px;
}

.custom_font textarea {
    width: 400px;
    height: 180px;
    min-height: 120px;
    max-height: 220px;
    resize: none;
}

.font_styling {
    width: 400px;
    height: 30px;
    background: grey;
}

.custom_font {
    background: #acacac;
    width: 400px;
    height: 120px;
}

#fs {
  width: 150px;
  height: 25px;
  font-size: 12px;;
}

.form-control{
  width: 300px;
}

.inner{
  display: inline-block;
}
</style>


<div class="column middle">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Background</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Image</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Font</button>
</div>

<div id="London" class="tabcontent">
  <br>
<table style="padding: 10px 10px 10px 10px;">
  <tr>
    <td><label for="colorPicker"><h6>Background color: </h6></label><br>
    </td>
  </tr>
  <tr>
      <td style="padding: 10px;"><input type="color" value="#8888ff" id="colorPicker" class="form-control"></td>
      <td><p id="output"></p></td>
  </tr>
  <tr>
    <td><label for="bgImage"><h6>Background Image: </h6></label>
    </td>
  </tr>
  <tr>
    <td style="padding: 10px;"><input type="file" accept="image/*" id="bgImage" onchange="loadFile(event)" class="bgimg form-control"></td><td><span><button class="inner" onclick="clearBg()" title="Clear beackground image">x</button></span>
    </td>
  </tr>
</table>
</div>
<script>
  function clearBg(){
    document.getElementById("bgImage").value = "";
    $('#imageBg').remove();

}
 
</script>

<div id="Paris" class="tabcontent">

        <div>
            <label for="addImage"><h6>Add Image: </h6></label>
            <input type="file" id="addFile" accept="image/png, image/jpg" class="upload form-control">
        </div>
        <br>
</div>

<div id="Tokyo" class="tabcontent">
  <div>

        <label for="bgColor"><h6>Text Font: </h6></label><br>
        
      <!--<link href='https://fonts.googleapis.com/css?family=Montez|Lobster|Josefin+Sans|Shadows+Into+Light|Pacifico|Amatic+SC:700|Orbitron:400,900|Rokkitt|Righteous|Dancing+Script:700|Bangers|Chewy|Sigmar+One|Architects+Daughter|Abril+Fatface|Covered+By+Your+Grace|Kaushan+Script|Gloria+Hallelujah|Satisfy|Lobster+Two:700|Comfortaa:700|Cinzel|Courgette' rel='stylesheet' type='text/css'>

	    <div id = "text">
        <select id = 'select' onChange = "return fontChange();">
	    </select>
		    <h4 id = "h4"><input type="text" value="haha"></h4>
        <div id = "output">Grumpy wizards</div>
        <br>
        </div>-->

<div class="custom_font">

<select id="fs custom_font" onchange="changeFont(this.value);">
    <option value="arial" style="font-family: Arial;">Arial</option>
    <option value="Nosifer, cursive" style="font-family: Nosifer;">Nosifer</option>
    <option value="League Script, cursive" style="font-family: League Script;">League Script</option>
    <option value="Yellowtail, cursive" style="font-family: Yellowtail;">Yellowtail</option>
    <option value="Permanent Marker, cursive" style="font-family: Permanent Marker;">Permanent Marker</option>
    <option value="Codystar, cursive" style="font-family: Codystar;">Codystar</option>
    <option value="'Eater', cursive" style="font-family: Eater;">Eater</option>
    <option value="Molle, cursive" style="font-family: Molle;">Molle</option>
    <option value="Snowburst One, cursive" style="font-family: Snowburst one;">Snowburst One</option>
    <option value="Shojumaru, cursive" style="font-family: Shojumaru;">Shojumaru</option>
    <option value="Frijole, cursive" style="font-family: Frijole;">Frijole</option>
    <option value="Gloria Hallelujah, cursive" style="font-family: Gloria Hallelujah;">Gloria Hallelujah</option>
    <option value="Calligraffitti, cursive" style="font-family: Calligrafitti;">Calligraffitti</option>
    <option value="Tangerine, cursive" style="font-family: Tangerine;">Tangerine</option>
    <option value="Monofett, cursive" style="font-family: Monofett;">Monofett</option>
    <option value="Monoton, cursive" style="font-family: Monoton;">Monoton</option>
    <option value="Arbutus, cursive" style="font-family: Arbutus;">Arbutus</option>
    <option value="Chewy, cursive" style="font-family: Chewy;">Chewy</option>
    <option value="Playball, cursive" style="font-family: Playball;">Playball</option>
    <option value="Black Ops One, cursive" style="font-family: Black Ops One;">Black Ops One</option>
    <option value="'Rock Salt', cursive" style="font-family: Rock Salt;">Rock Salt</option>
    <option value=" 'Pinyon Script', cursive" style="font-family: Pinyon Script;">Pinyon Script</option>
    <option value="'Orbitron', sans-serif" style="font-family: Orbitron;">Orbitron</option>
    <option value="'Sacramento', cursive" style="font-family: Sacramento;">acramento</option>
    <option value="'Sancreek', cursive" style="font-family: Sancreek;">Sancreek</option>
    <option value="'Kranky', cursive" style="font-family: Kranky;">Kranky</option>
    <option value="'UnifrakturMaguntia', cursive" style="font-family: UnifrakturMaguntia;">UnifrakturMaguntia</option>
    <option value="'Creepster', cursive" style="font-family: Creepster;">Creepster</option>
    <option value="'Pirata One', cursive" style="font-family: Pirata One;">Pirata One</option>
    <option value=" 'Seaweed Script', cursive" style="font-family: Seaweed Script;">Seaweed Script</option>
    <option value=" 'Miltonian', cursive" style="font-family: Miltonian;">Miltonian</option>
    <option value=" 'Herr Von Muellerhoff', cursive" style="font-family: Herr Von Muellerhoff;">Herr Von Muellerhoff</option>
    <option value=" 'Rye', cursive" style="font-family: Rye;"> 'Rye'</option>
    <option value=" 'Jacques Francois Shadow', cursive" style="font-family: Jacques Francois Shadow;">Jacques Francois Shadow</option>
    <option value=" 'Montserrat Subrayada', sans-serif" style="font-family: Montserrat Subrayada;">Montserrat Subrayada</option>
    <option value=" 'Akronim', cursive" style="font-family: Akronim;">Akronim</option>
    <option value=" 'Faster One', cursive" style="font-family: Faster One;">Faster One</option>
    <option value=" 'Megrim', cursive" style="font-family: Megrim;">Megrim</option>
    <option value=" 'Cedarville Cursive', cursive" style="font-family: Cedarville;">Cedarville Cursive</option>
    <option value=" 'Ewert', cursive" style="font-family: Ewert;">Ewert</option>
    <option value="'Plaster', cursive" style="font-family: Plaster;">Plaster</option>
    <option value="verdana" style="font-family: Verdana;">Verdana</option>
    <option value="impact" style="font-family: Impact;">Impact</option>
    <option value="ms comic sans" style="font-family: Ms comic sans;">MS Comic Sans</option>
</select>
<input type="color" name="favcolor" onChange="changeColor(this.value);" placeholder="Color Name" />
<div class="font_styling">

    <span id="bold_button" onclick="b();"><b>B</b></span>
    <span id="italic_button" onclick="i();"><i>I</i></span>

    <select id="font_size" onchange="changeFontSize(this.value);" style="width: 100px; font-size: 12px;">
        <?php
            for($i=10;$i<=140;$i+=2){
        ?>
            
            <option value="<?php echo $i; ?>px"><?php echo $i; ?>px</option>
        <?php		
            }
        ?>
    </select>
</div>
<textarea id="custom_text" placeholder="Add text"></textarea>
<button type="button" class="btn btn-primary" id="apply_text">Apply
</button>

</div>

    </div>

<SCRIPT>
  var $nos_icons=0,$nos_text=0,$custom_img=0;

  	$('#apply_text').click(function(){
		
		var text_val = jQuery("textarea#custom_text").val();
		if(!text_val)
			return false;
		
			$(".front_print").append("<div id=text"+($nos_text)+" class='new_text'  onmouseover='show_delete_btn(this);' onmouseout='hide_delete_btn(this);'><span class='drag_text property_icon'  ></span><textarea id='text_style' >"+text_val+"</textarea><span class='delete_text property_icon' onClick='delete_text(this);' ></span></div>");
			$( "#text"+($nos_text)+"" ).draggable({ containment: ".front_print" });
			$( "#text"+($nos_text)+"" ).resizable({
				maxHeight: 480,
				maxWidth: 450,
				minHeight: 60,
				minWidth: 60
			});

		var $font_			=$('#custom_text').css("font-family");
		var $font_size		=$('#custom_text').css("font-size");
		var $font_weight	=$('#custom_text').css("font-weight");
		var $font_style		=$('#custom_text').css("font-style");
		var $font_color		=$('#custom_text').css("color");
		//alert($font_u);
		
		
		$("#text"+($nos_text)+" textarea" ).css("font-family", $font_);
		$("#text"+($nos_text)+" textarea" ).css("font-size", $font_size);
		$("#text"+($nos_text)+" textarea" ).css("font-weight", $font_weight);
		$("#text"+($nos_text)+" textarea" ).css("font-style", $font_style);
		$("#text"+($nos_text)+" textarea" ).css("color", $font_color);
		$("#text"+($nos_text)).css({'top':'100px','left':'150px'});
		//document.getElementById("text"+($nos_text)+" textarea").style.textDecoration=(""+$font_u+"");
		++$nos_text;
	});

//image icon
  function image_icon($srcimg){
			$(".front_print").append("<div id=icon"+($nos_icons)+" class='new_icon' onmouseover='show_delete_btn(this);' onmouseout='hide_delete_btn(this);'><span class='delete_icon property_icon' onClick='delete_icons(this);'></span><img src='"+$srcimg+"' width='100%' height='100%' /></div>");
			$( "#icon"+($nos_icons)+"" ).draggable({ containment: "parent" });
			$( "#icon"+($nos_icons)+"" ).resizable({
				maxHeight: 480,
				maxWidth: 450,
				minHeight: 60,
				minWidth: 60
				});
			$( "#icon"+($nos_icons)+"" ).css({'top':'100px','left':'150px'});
			++$nos_icons;
	}

function delete_icons(e){
		
		$(e).parent('.new_icon').remove();
		
		--$nos_icons;
	}
	function show_delete_btn(e){
	
		$(e).children('.property_icon').show();
	}
	function hide_delete_btn(e){
	
		$(e).children('.property_icon').hide();
	}
	
	/*=============================================*/
function delete_text(f){
			$(f).parent('.new_text').remove();
			--$nos_icons;
	}
</script>
</div>
</div>
</div>

<script>
  //TAB CONTENT
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
  
    </div>
<!--Image Preview-->
<?php 
  $proId = $_GET['proId'];
  if( $proId == 1 || $proId == 2){ 
?>
<style>
  #box {
  width: 500px;
  height: 350px;
  border: 1px solid black;
  padding: 4px 6px;
  font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif"
}
  #canvas {
    margin-top: 20px; 
    background-color:#fff;
    border:1px solid red;    
    height:300px;
    width:300px;

}
</style>
<div class="column side-right">

<div id="box">
    <center>
        <div id="canvas" class="canvas"><div id="output"></div>
            <div class="front_print"></div>
        </div></center>      
</div>
<br>
<?php $proId = $_GET['proId'];  ?>
<form method="post" action="confirmDesign.php?proId=<?php echo $proId ?>">
    <input id="btn-Preview-Image" type="button" value="Preview" data-toggle="modal" title="Click to preview" class="btn btn-primary"/>
    
    <input type="submit" value="Next" style="position: absolute; right: 100px;" id="nextAction" class="btn btn-primary" disabled title="Make sure to download your latest design"></form>
</div>

  <?php } else { ?>
    <?php if( $proId == 3){ ?>
<style>
  #box {
  width: 500px;
  height: 450px;
  border: 1px solid black;
  padding: 4px 6px;
  font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif";
  background-image: url("product/shirtcloseup.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  #canvas {
    margin-top: 20px; 
    background-color:#fff;
    border:1px solid red;    
    height:300px;
    width:300px;

}
</style>
  <div class="column side-right">

    <div id="box">
        <center>
            <div id="canvas" class="shirt-bag"><div id="output"></div>
                <div class="front_print"></div>
            </div></center>      
    </div>
    <br>
    <?php $proId = $_GET['proId'];  ?>
    <form method="post" action="confirmDesign.php?proId=<?php echo $proId ?>">
        <input id="btn-Preview-Image" type="button" value="Preview" title="Click to preview" data-toggle="modal" class="btn btn-primary"/>
        
        <input type="submit" value="Next" style="position: absolute; right: 100px;" class="btn btn-primary" id="nextAction" disabled title="Make sure to download your latest design"></form>
  </div><?php } else {?>
  <style>
  #box {
  width: 500px;
  height: 450px;
  border: 1px solid black;
  padding: 4px 6px;
  font: 16px "Lucida Grande", "Helvetica", "Arial", "sans-serif";
  background-image: url("product/bagcloseup.png");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
  #canvas {
    margin-top: 60px; 
    background-color:#fff;
    border:1px solid red;    
    height:300px;
    width:300px;

}
</style>
  <div class="column side-right">

    <div id="box">
        <center>
            <div id="canvas" class="shirt-bag"><div id="output"></div>
                <div class="front_print"></div>
            </div></center>      
    </div>
    <br>
    <?php $proId = $_GET['proId'];  ?>
    <form method="post" action="confirmDesign.php?proId=<?php echo $proId ?>">
        <input id="btn-Preview-Image" type="button" value="Preview" data-toggle="modal" title="Click to preview" class="btn btn-primary"/>
        
        <input type="submit" value="Next" style="position: absolute; right: 100px;" class="btn btn-primary" id="nextAction" disabled title="Make sure to download your latest design"></form>
  </div><?php }} ?>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <center><div id="image_reply"></div></center>
    <a id="btn-Convert-Html2Image" href="#" onclick="enableBtn();" title="Click to download">Download</a>
  </div>
<script>
function enableBtn() {
document.getElementById("nextAction").disabled = false;
}
</script>
</div>
  

</body>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
    <?php include("footer.php"); ?>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("btn-Preview-Image");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  var remove=document.getElementById("image_reply").lastChild;
  document.getElementById("image_reply").removeChild(remove);
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    var remove=document.getElementById("image_reply").lastChild;
    document.getElementById("image_reply").removeChild(remove);
  }
}
</script>
<!--<script>
  //fonttttttttttt
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
</script>-->

<script>
    	function b() {
		$('#custom_text').toggleClass('bold_text');
		$("#bold_button").toggleClass('box-shadow', '0 0 10px inset #3c3c3c');
	}

	function i() {
		$('#custom_text').toggleClass('italic_text');
	}

	function changeFont(_name) {
		$('#custom_text').css("font-family", _name);
	}

	function changeFontSize(_size) {
		$('#custom_text').css("font-size", _size);
	}

	function changeColor(_color) {
		$('#custom_text').css("color", _color);
	}
</script>

<script>
//script for colour
let colorPicker = document.getElementById("colorPicker");
let canvas = document.getElementById("canvas");
let output = document.getElementById("output");

canvas.style.borderColor = colorPicker.value;

colorPicker.addEventListener("input", function(event) {
  canvas.style.borderColor = event.target.value;
  canvas.style.backgroundColor = event.target.value;
}, false);

colorPicker.addEventListener("change", function(event) {
  output.innerText = "Color set to " + colorPicker.value + ".";
}, false);
</script>

<script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('div.front_print')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<script>
//script for background image
$(document).ready(function(){

$('input.upload').on('change', addFile);

});

function loadFile (event) {

   var jqDisplay = $('div.front_print');
   var reader = new FileReader();
   var selectedFile = event.target.files[0];

   reader.onload = function (event) {
       var imageSrc = event.target.result;
       //jqDisplay.html('<img src="' + imageSrc + '" alt="uploaded Image" class="resize-drag" draggable="true" ondragstart="drag(event) style:">');
       jqDisplay.html('<img src="' + imageSrc + '" alt="uploaded Image" style: width: 300px; height: 300px;" id="imageBg">');
   };
  reader.readAsDataURL(selectedFile); 
}
</script>

<script>
	//$('input[type=file]').bootstrapFileInput();
	//$('.file-inputs').bootstrapFileInput();
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				image_icon(e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$("#addFile").change(function() {
		readURL(this);
	});

</script>

<script>
//script for drag image
interact('.resize-drag')
  .draggable({
    onmove: window.dragMoveListener
  })
  .resizable({
    //preserveAspectRatio: true,
    // resize from all edges and corners
    edges: { left: true, right: true, bottom: true, top: true },

    // keep the edges inside the parent
    restrictEdges: {
      outer: '#canvas',
      endOnly: true,
    },

    // minimum size
    restrictSize: {
      min: { width: 100, height: 50 },
    },

    //inertia: true,
  })
  .on('resizemove', function (event) {
    var target = event.target,
        x = (parseFloat(target.getAttribute('data-x')) || 0),
        y = (parseFloat(target.getAttribute('data-y')) || 0);

    // update the element's style
    target.style.width  = event.rect.width + 'px';
    target.style.height = event.rect.height + 'px';

    // translate when resizing from top or left edges
    x += event.deltaRect.left;
    y += event.deltaRect.top;

    target.style.webkitTransform = target.style.transform =
        'translate(' + x + 'px,' + y + 'px)';

    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
    target.textContent = event.rect.width + '×' + event.rect.height;
  });

function dragMoveListener (event) {
    var target = event.target,
        // keep the dragged position in the data-x/data-y attributes
        x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
        y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

    // translate the element
    target.style.webkitTransform =
    target.style.transform =
      'translate(' + x + 'px, ' + y + 'px)';

    // update the posiion attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);
  }
</script>

<script>
$(document).ready(function(){

$("#previewImage").removeClass('dis_none') ;
$("#image_reply").empty();
$y_pos="front";

var element = $("#canvas"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                getCanvas = canvas;
                document.getElementById("image_reply").appendChild(getCanvas);
             }
         });
    });

	$("#btn-Convert-Html2Image").on('click', function () {

    var imgageData = getCanvas.toDataURL();
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "design.png").attr("href", newData);
	});

});

</script>
</html>