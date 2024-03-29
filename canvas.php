<!DOCTYPE html>
<html>
  <head>
    <title>Capture Webpage Screenshot</title>
	<!-- include the jquery and jquery ui -->
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<!-- this script helps us to capture any div --> 
	<script src="js/html2canvas.js"></script>

	<style>
		/* these are just styles added for this demo page */
		#canvas{
			width: 572px;
			height: 400px;
			background-image: url(bg_img/bg.jpg);
			margin: 0 auto;
		}
		.movable_div{
			color: white;
			font-family: Verdana;
			cursor: move;
			position: absolute;
		}
		#design{
			width: 510px;
			margin: 0 auto;
			background: purple;
			border: 1px solid black;
			color : white;
			padding: 30px;
		}
		
	</style>
  </head>
  <body>  
	<h3 align="center">Theonlytutorials.com - See the tutorial here <a href="">Click Here</a></h3>
	<div id="design">
		<div id="controls">
			Text: <input type="text" value="Agurchand" id="textbox" /> <input type="button" value="Capture" id="capture" /><br /><br />				
			Font Size: <input id="slider" type ="range" min ="12" max="50" value ="0"/><br /><br />
			Select Background: <select id="background"><option value="bg.jpg">Background 1</option><option value="bg2.jpg">Background 2</option></select>
		</div>	
		<br />
	</div>
	<div id="canvas">
		<div class="movable_div">Agurchand</div>
	</div>	
	<p align="center">Drag the text and place it wherever you want on the picture</p>
    <script type="text/javascript">	
		$(function(){	
			
			//to make a div draggable
			$('.movable_div').draggable(
				{containment: "#canvas", scroll: false}
			);
			
			//to capture the entered text in the textbox 
			$('#textbox').keyup(function(){
				var text = $(this).val();
				$('.movable_div').text(text);
			});	
			
			//to change the background once the user select
			$('#background').change(function(){
				var background = $(this).val();
				$('#canvas').css('background', 'url(bg_img/'+background+')');
			});
			
			//font size handler here. 
			$('#slider').change(function(){
				fontSize = $(this).val();
				$('.movable_div').css('font-size', fontSize+'px');
			});		

			//here is the hero, after the capture button is clicked
			//he will take the screen shot of the div and save it as image.
			$('#capture').click(function(){
				//get the div content
				div_content = document.querySelector("#canvas")
				//make it as html5 canvas
				html2canvas(div_content).then(function(canvas) {
					//change the canvas to jpeg image
					data = canvas.toDataURL('image/jpeg');
					
					//then call a super hero php to save the image
					save_img(data);
				});
			});			
		});
		
		
		//to save the canvas image
		function save_img(data){
			//ajax method.
			$.post('save_jpg.php', {data: data}, function(res){
				//if the file saved properly, trigger a popup to the user.
				if(res != ''){
					yes = confirm('File saved in output folder, click ok to see it!');
					if(yes){
						location.href =document.URL+'/output/'+res+'.jpg';
					}
				}
				else{
					alert('something wrong');
				}
			});
		}
    </script>
  </body>
</html>
