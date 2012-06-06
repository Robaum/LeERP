<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>LEERP punch in/out</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript">
function get_loc(){
if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition( 
 
		function (position) {  
 		var currentTime = new Date();
		var month = currentTime.getMonth() + 1;
		var day = currentTime.getDate();
		var year = currentTime.getFullYear();
		var hours = currentTime.getHours()
		var minutes = currentTime.getMinutes()
		if (minutes < 10){
			minutes = "0" + minutes
		}
		var le_date = month + "/" + day + "/" + year + " " + hours + ":" + minutes;
 		if(document.getElementById("nnum").value != ""){
 		$.ajax({
 	 			type: "POST",
  				url: "index2.php",
  				data: { lat: position.coords.latitude, longi: position.coords.longitude, numb: document.getElementById("nnum").value, time: le_date }
				}).done(function( html ) {
					$("#ce3").html( html );
		});
 		}
 		
 		
 		
		}, 
		// next function is the error callback
		function (error)
		{
			switch(error.code) 
			{
				case error.TIMEOUT:
					alert ('Timeout');
					break;
				case error.POSITION_UNAVAILABLE:
					alert ('Position unavailable');
					break;
				case error.PERMISSION_DENIED:
					alert ('Permission denied');
					break;
				case error.UNKNOWN_ERROR:
					alert ('Unknown error');
					break;
			}
		}
		);
	}
}


</script>
</head>

<body>
  <div class="wrap">
    <header>
    	<div class="logo">
    		<a href="index.html">
    			<img src="../logo.png"/>
    			<span class="title"><span>punch</span>&nbsp;in/out</span>
    		</a>
    	</div>   
		<div id="ce3">
			<center>Phone number:<br />
			<?php
			if($_COOKIE["ne3"] == ""){
				echo '<input type="tel" style="width: 80%; border: 1px solid #aaa; height: 50px; font-size: 32px;" id="nnum"><br /><br />';
			}else{
				echo '<input type="tel" style="width: 80%; border: 1px solid #aaa; height: 50px; font-size: 32px;" id="nnum" value="'.$_COOKIE["ne3"].'" readonly="readonly"><br /><br />';
			}
			?>
			<input type="button" value="punch now!" style="width: 80%; font-size: 20px;" onclick="get_loc();"/><br /><br /></center>
		</div>
    </header>
    <footer>
    	<center><p>Copyright 2012 LEERP</p></center>
    </footer>
  </div>
</body>
</html>
