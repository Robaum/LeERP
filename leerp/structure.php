<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];

$conn = mysql_connect("localhost", "root", "hola123");
mysql_select_db("le_erp");
mysql_query("SET NAMES 'utf8'");
include("grid/inc/jqgrid_dist.php");
$g = new jqgrid();
$grid["caption"] = "Structure";
$g->set_options($grid);
$g->table = "structure";
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="grid/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="grid/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="grid/js/jquery.min.js" type="text/javascript"></script>
	<script src="grid/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="grid/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="grid/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
	<style>
		body{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		}
		a:link {
	color: #000;
}

a:hover, a:active {
	text-decoration: none;
	color: #000;
}

a:visited {
	color: #000;
}
	</style>
</head>
<body>
	<div style="margin:10px">
	<div style='width: 900px; text-align: right;'>
		<a  href='structure_v.php' target=_blank><img src='svi.png' style='margin-right: 5px;'/>Structure Visual View</a>
	</div>
	<?php echo $out?>
	</div>
</body>
</html>
