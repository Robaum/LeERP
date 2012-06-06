<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API Example</title>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;zoom=8&amp;key=AIzaSyCTVgT4WnjSkq_vrr3JHt6LZpWWWKS6Egk" type="text/javascript"></script>
<script type="text/javascript">
	
    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));

<?php
$sql="SELECT * FROM punchs where DATE(time)=DATE(NOW())";
				$result=mysql_query($sql);
				$ee = 0;
				while($row = mysql_fetch_object($result)){
					echo "var point".$ee." = new GLatLng(".$row->lat.", ".$row->long.");";
					echo " map.setCenter(point".$ee.", 15);  map.setUIToDefault(); map.setMapType(G_NORMAL_MAP); var marker".$ee." = new GMarker(point".$ee."); map.addOverlay(marker".$ee.");";
					$ee++;
				}
?>
		
       
      }
    }
	
	window.onload = initialize;
	
</script>
    
    
<style type="text/css">
<!--
body {
	font-family: Arial, Helvetica, sans-serif
}

#map_canvas {
	width:650px;
	height:400px;
	border:1px solid #CCCCCC;
	margin:5px auto;
	font-size:75%;
}
-->
</style>
</head>

<body>
<div id="map_canvas"></div>
</body>
</html>
