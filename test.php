<?php

//select a database to work with
$db_selected = mysqli_connect("localhost","root","","gtpcom_desain") or die(mysqli_error($db_selected));

$base_site_name = "cm";
$base_url = "localhost/".$base_site_name;
$base_name_site = "Desain";
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="true" />
    <title><?php echo $base_name_site; ?></title>
    <link href='https://fonts.googleapis.com/css?family=Nosifer|League+Script|Yellowtail|Permanent+Marker|Codystar|Eater|Molle:400italic|Snowburst+One|Shojumaru|Frijole|Gloria+Hallelujah|Calligraffitti|Tangerine|Monofett|Monoton|Arbutus|Chewy|Playball|Black+Ops+One|Rock+Salt|Pinyon+Script|Orbitron|Sacramento|Sancreek|Kranky|UnifrakturMaguntia|Creepster|Pirata+One|Seaweed+Script|Miltonian|Herr+Von+Muellerhoff|Rye|Jacques+Francois+Shadow|Montserrat+Subrayada|Akronim|Faster+One|Megrim|Cedarville+Cursive|Ewert|Plaster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/fontfamilystyle.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="css/colpick.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="css/mystyle.css" type="text/css" charset="utf-8" />
                <link href="img/favicon.png" rel="shortcut icon"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

        <!-- DESIGN ONLYYYYYYYYYYYYYYYYYYYYYYYY -->

        <script src="js/jsCustom/js/jquery-1.10.2.js">	</script>
        <script src="js/jsCustom/js/bootstrap.js">		</script>
        <script type="text/javascript" src="js/jsCustom/js/html2canvas.js"></script>
        <script src="js/jsCustom/js/jquery.form.js"></script>
        <script src="js/jsCustom/js/mainapp.js"></script>
        <link rel="stylesheet" href="tdesignAPI/css/jquery-ui.css" />
        <script src="js/jsCustom/js/jquery-ui.js"></script>
        <style>
        .navbar-inverse{
            background-color:#192D41;
            border-color: #192D41;
            border-radius: 0px;
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
            width: calc(40% - 3%);
            margin-right: 3%;
            background: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 20px;
        }

        .column.side-right {
            width: 45%;
            background: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 20px;
        }

        .main {
            max-width: 90%;
            margin: auto;
        }

        .footer {
            text-align: left;
            background: #ddd;
            margin-top: 20px;
        }
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
            border-radius:50%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            width:300px;
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
        </style>
        
    </head>
    <?php include("header.php"); ?>
	<body>
    <div class="main">
    <div class="column side">

        <hr>
            <h6>My Account</h6>
        <hr>
            <p><a href = "profile.php" >Profile</a></p>
            <p><a href = "changePassword.php" >Change Password</a></p>
        <hr>
            <h6>Order</h6>
        <hr>
            <p><a href = "checkStatus.php" >Order Status</a> </p>
            <p><a href = "userHistory.php" >History</a></p>
  </div>

        <div class="column middle">
<style>
body {font-family: Arial;}

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
  height: 300px;
}
</style>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London'); openPanelItem()" id="defaultOpen">Image</button>
  <button class="tablinks" onclick="openCity(event, 'Paris'); openPanelImage()">Color</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo'); openPanelText()">Font</button>
</div>

<div id="London" class="tabcontent">
  <h3>Image</h3>

  <div>
        <h3 style="color: #58EAC6">Background</h3>

        <div>
                <label for="colorPicker"><h6>Background color: </h6></label><br>
                <input type="color" value="#8888ff" id="colorPicker">
                <p id="output"></p>
        </div>
        <div>
            <label for="bgImage"><h6>Add Background: </h6></label>
            <input type="file" accept="image/*" onchange="loadFile(event)">
        </div>
        <br>
        <div>
            <label for="addImage"><h6>Add Image: </h6></label>

            <div class="custom_icon">
				    <form id="form1" runat="server">
					    <span class="btn btn-default btn-file">
						  <input type='file' id="imgInp" />
					    </span>
            </form>
			      </div>
        </div>
        <br>
    </div>

</div>

<div id="Paris" class="tabcontent">
  <h3>Color</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Font</h3>
  <div class="custom_font">

<select id="fs" onchange="changeFont(this.value);">
    <option value="arial">Arial</option>
    <option value="Nosifer, cursive">Nosifer</option>
    <option value="League Script, cursive">League Script</option>
    <option value="Yellowtail, cursive">Yellowtail</option>
    <option value="Permanent Marker, cursive">Permanent Marker</option>
    <option value="Codystar, cursive">Codystar</option>
    <option value="'Eater', cursive">Eater</option>
    <option value="Molle, cursive">Molle</option>
    <option value="Snowburst One, cursive">Snowburst One</option>
    <option value="Shojumaru, cursive">Shojumaru</option>
    <option value="Frijole, cursive">Frijole</option>
    <option value="Gloria Hallelujah, cursive">Gloria Hallelujah</option>
    <option value="Calligraffitti, cursive">Calligraffitti</option>
    <option value="Tangerine, cursive">Tangerine</option>
    <option value="Monofett, cursive">Monofett</option>
    <option value="Monoton, cursive">Monoton</option>
    <option value="Arbutus, cursive">Arbutus</option>
    <option value="Chewy, cursive">Chewy</option>
    <option value="Playball, cursive">Playball</option>
    <option value="Black Ops One, cursive">Black Ops One</option>
    <option value="'Rock Salt', cursive">Rock Salt</option>
    <option value=" 'Pinyon Script', cursive">Pinyon Script</option>
    <option value="'Orbitron', sans-serif">Orbitron</option>
    <option value="'Sacramento', cursive">acramento</option>
    <option value="'Sancreek', cursive">Sancreek</option>
    <option value="'Kranky', cursive">Kranky</option>
    <option value="'UnifrakturMaguntia', cursive">UnifrakturMaguntia</option>
    <option value="'Creepster', cursive">Creepster</option>
    <option value="'Pirata One', cursive">Pirata One</option>
    <option value=" 'Seaweed Script', cursive">Seaweed Script</option>
    <option value=" 'Miltonian', cursive">Miltonian</option>
    <option value=" 'Herr Von Muellerhoff', cursive">Herr Von Muellerhoff</option>
    <option value=" 'Rye', cursive"> 'Rye'</option>
    <option value=" 'Jacques Francois Shadow', cursive">Jacques Francois Shadow</option>
    <option value=" 'Montserrat Subrayada', sans-serif">Montserrat Subrayada</option>
    <option value=" 'Akronim', cursive">Akronim</option>
    <option value=" 'Faster One', cursive">Faster One</option>
    <option value=" 'Megrim', cursive">Megrim</option>
    <option value=" 'Cedarville Cursive', cursive">Cedarville Cursive</option>
    <option value=" 'Ewert', cursive">Ewert</option>
    <option value="'Plaster', cursive">Plaster</option>
    <option value="verdana">Verdana</option>
    <option value="impact">Impact</option>
    <option value="ms comic sans">MS Comic Sans</option>
</select>
<input type="color" name="favcolor" onChange="changeColor(this.value);" placeholder="Color Name" />
<div class="font_styling">

    <span id="bold_button" onclick="b();"><b>B</b></span>
    <span id="italic_button" onclick="i();"><i>I</i></span>

    <select id="font_size" onchange="changeFontSize(this.value);">
        <?php
            for($i=10;$i<=140;$i+=2){
        ?>
            
            <option value="<?php echo $i; ?>px"><?php echo $i; ?>px</option>
        <?php		
            }
        ?>
        

    </select>
</div>
<textarea id="custom_text" placeholder="Create Your Custom Text..."></textarea>
<button type="button" class="btn btn-primary" id="apply_text">
    Apply
</button>

</div>
</div>
</div>

<div class="column side-right">
<div id="box">
        <center>
            <div id="canvas"><div id="//"></div>
                <div class="myTarget" ></div>
                <div id='preview_t'>
                <div id="preview_front">
				<div class="front_print">

				</div>
			</div></div>
            </div></center>      
    </div>
        </div>
          
	</body>

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
var loadFile = function(event) {
    var canvas = document.getElementById('canvas');
    canvas.style.backgroundImage= "url("+URL.createObjectURL(event.target.files[0])+")";
    canvas.style.backgroundSize= "300px";
  };
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


	$("#imgInp").change(function() {
		readURL(this);
	});

</script>

<script>
var $type="tee",$color="black",$y_pos="front",$nos_icons=0,$nos_text=0,$custom_img=0;
$(document).ready(function(){
	
	//ONLOAD
	$("#preview_front").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_front.png) ') ;
	$("#preview_back").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_back.png) ') ;
	//$("#preview_front, #preview_back , #preview_left, #preview_right").css('background-color', 'blue') ;
	$("#preview_front,.T_type").removeClass('dis_none');
	$("#preview_back,.color_pick,.default_samples,.custom_icon,.custom_font").addClass('dis_none') ;
	//$('.modal').css('dispaly','none');

	//ONLOAD OVER
	
	/*==========================SWITCH MENU===========================*/
	$(".sel_type").click(function(){
		$(".T_type").removeClass('dis_none');
		$(".color_pick,.default_samples,.custom_icon,.custom_font").addClass('dis_none') ;
	});
	$(".sel_color").click(function(){
		$(".color_pick").removeClass('dis_none');
		$(".T_type,.default_samples,.custom_icon,.custom_font").addClass('dis_none') ;
	});
	$(".sel_art").click(function(){
		$(".default_samples").removeClass('dis_none');
		$(".T_type,.color_pick,.custom_icon,.custom_font").addClass('dis_none') ;
	});
	$(".sel_custom_icon").click(function(){
		$(".custom_icon").removeClass('dis_none');
		$(".T_type,.color_pick,.default_samples,.custom_font").addClass('dis_none') ;
	});
	$(".sel_text").click(function(){
		$(".custom_font").removeClass('dis_none');
		$(".T_type,.color_pick,.default_samples,.custom_icon").addClass('dis_none') ;
	});
	
	
	/*=========================SWITCH MENU OVER=====================*/
	/*==========================select type=====================*/
	$("#radio1").click(function(){	//tee
		$type="tee";
		change_it();
		
	});
	$("#radio2").click(function(){	//polo
		$type="polo";
		change_it();
		
	});
	$("#radio3").click(function(){	//hoodie
		$type="hoodie";
		change_it();
	});
	/*==========================select type over=====================*/
	/*==========================select back or front=====================*/
	$("#o_front").click(function(){
		$y_pos="front";
				$("#preview_front").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_'+$y_pos+'.png) ') ;
				$("#o_front").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_front.png');
				$("#o_back").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_back.png');
				$("#preview_front").removeClass('dis_none') ;
				$("#preview_back").addClass('dis_none') ;
		
	});
	$("#o_back").click(function(){
		$y_pos="back";
				$("#preview_back").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_'+$y_pos+'.png) ') ;
				$("#o_front").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_front.png');
				$("#o_back").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_back.png');
				$("#preview_back").removeClass('dis_none') ;
				$("#preview_front").addClass('dis_none') ;
		
	});
/*==========================select back or front OVER=====================*/
/*==========================select COLOR=====================*/
	$('#red').click(function(){
				$color="red";
				change_it();
	});
	$('#black').click(function(){
				$color="black";
				change_it();
	});
	$('#white').click(function(){
				$color="white";
				change_it();
	});
	$('#green').click(function(){
				$color="green";
				change_it();
	});
	$('#navy').click(function(){
				$color="navy";
				change_it();
	});
	function change_it(){
				$("#preview_back").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_back.png) ') ;
				$("#preview_front").css('background-image', 'url(tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_front.png) ') ;
				$("#o_front").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_front.png');
				$("#o_back").attr('src','tdesignAPI/images/product/'+$type+'/'+$color+'/'+$color+'_back.png');
		
	}
	/*==========================select COLOR OVER=====================*/
/*=====================SAMPLE ICONS========================*/
	$(".sample_icons").click(function(){
		var $srcimg=$(this).children("img").attr('src');
		image_icon($srcimg);
		
	});

	$(".folder_toggle").click(function(){
		$i=$(this).attr('value');
		$folder=$(this).attr('data-folder');
		$.ajax({
			      url: 'tdesignAPI/control/newcontent.php?folder='+$folder,
			      success: function()
		      	{
		        	$("#toggle_show"+$i ).empty().load("tdesignAPI/control/newcontent.php?folder="+$folder);
		      	}
	    });
	});
/*=====================SAMPLE ICONS over========================*/

/*
 * Font resiZable
 * 
 * 
 * 
 *
var initDiagonal;
var initFontSize;

$(function() {
    $("#resizable").resizable({
        alsoResize: '#content',
        create: function(event, ui) {
            initDiagonal = getContentDiagonal();
            initFontSize = parseInt($("#content").css("font-size"));
        },
        resize: function(e, ui) {
            var newDiagonal = getContentDiagonal();
            var ratio = newDiagonal / initDiagonal;
            
            $("#content").css("font-size", initFontSize + ratio * 3);
        }
    });
});

function getContentDiagonal() {
    var contentWidth = $("#content").width();
    var contentHeight = $("#content").height();
    return contentWidth * contentWidth + contentHeight * contentHeight;
}
/*
 * 
 * 
 * 
 */

	$('#apply_text').click(function(){
		
		var text_val = jQuery("textarea#custom_text").val();
		if(!text_val)
			return false;
		
			$("."+$y_pos+"_print").append("<div id=text"+($nos_text)+" class='new_text'  onmouseover='show_delete_btn(this);' onmouseout='hide_delete_btn(this);'><span class='drag_text property_icon'  ></span><textarea id='text_style' >"+text_val+"</textarea><span class='delete_text property_icon' onClick='delete_text(this);' ></span></div>");
			$( "#text"+($nos_text)+"" ).draggable({ containment: "parent" });
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
$('.preview_images').click(function(){
	capture();
	//$('.modal').addClass('in');
	$('.layer').css('visibility','visible');
	//$('.layer').css('visibility','visible');
	//$('body').css('position','fixed');
	//$('.modal').css({'display':'block','height':'auto'});
	//$('.design_api').css('position', 'fixed');
	//$('.modal').css('overflow', 'scroll');
});


$('.close_img').click(function(){

	
	$('.layer').css('visibility','hidden');
	//$('.layer').css('visibility','hidden');
	//$('body').css('position','relative');
	
});

function capture() {
	
	$("#preview_back").removeClass('dis_none') ;
	$("#preview_front").removeClass('dis_none') ;
	$("#image_reply").empty();
	$y_pos="front";
	 html2canvas($('#preview_front'), {
            onrendered: function(canvas) {
                document.getElementById("image_reply").appendChild(canvas);
				//Set hidden field's value to image data (base-64 string)
				$('#img_front').val(canvas.toDataURL("image/png"));
            }
        });
	//$('#preview_front').hide();
	//$('#preview_back').show();
    html2canvas($('#preview_back'), {
            onrendered: function(canvas) {
				//$('#img_back').val(canvas.toDataURL("image/png"));
                document.getElementById("image_reply").appendChild(canvas);
				$('#img_back').val(canvas.toDataURL("image/png"));
				$("#preview_back").addClass('dis_none') ;
            }
        });
}


});

	function image_icon($srcimg){
			$("."+$y_pos+"_print").append("<div id=icon"+($nos_icons)+" class='new_icon' onmouseover='show_delete_btn(this);' onmouseout='hide_delete_btn(this);'><span class='delete_icon property_icon' onClick='delete_icons(this);'></span><img src='"+$srcimg+"' width='100%' height='100%' /></div>");
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

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
	
				$("."+$y_pos+"_print").append("<div id='c_icon"+($custom_img)+"' class='new_icon'><span class='delete_icon' onClick='delete_icons(this);' ></span><img src='#' id='c_img"+$custom_img+"' width='100%' height='100%' /></div>");
				$( "#c_icon"+($custom_img)+"" ).draggable({ containment: "parent" });
				$( "#c_icon"+($custom_img)+"" ).resizable({
					maxHeight: 480,
					maxWidth: 450,
					minHeight: 60,
					minWidth: 60
				});		
			
			
			$("#c_img"+($custom_img)+"").attr('src', e.target.result);
			++$custom_img;
			};
            reader.readAsDataURL(input.files[0]);
        }
}
  
</script>
<script>

</script>

</html>