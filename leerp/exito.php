<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : StandardIssue
Version    : 1.0
Released   : 20070723
Description: A two-column, fixed-width and lightweight template ideal for 1024x768 resolutions. Suitable for blogs and small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>LE ERP</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="js/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="./fgrid/css/flexigrid.css">
<script type="text/javascript" src="./fgrid/js/flexigrid.js"></script>
<link href="./css/fileuploader.css" rel="stylesheet" type="text/css">
<script src="./js/fileuploader.js" type="text/javascript"></script>
<link rel="stylesheet" href="./js/fancy/jquery.fancybox.css?v=2.0.6" type="text/css" media="screen" />
<script type="text/javascript" src="./js/fancy/jquery.fancybox.pack.js?v=2.0.6"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">

<script type="text/javascript">
function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 $(document).ready(function(){
	mainmenu();
});
</script>
<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><img src="logo2.png" /></h1>
	</div>
	<div id="menu">
		<ul id="nav">
			<li><a href="#">organization |</a>
				<ul>
					<li><a href="#" onclick="structure();">structure</a></li>
					<li><a href="#" onclick="g_i();">general info</a></li>
					<li><a href="#" onclick="j_t();">job titles</a></li>
				</ul>
			</li>
			<li>
				<a href="#">personnel |</a>
				<ul>
					<li><a href="#" onclick="employees();">employees</a></li>
				</ul>
			</li>
			<li>
				<a href="#">recruiting |</a>
				<ul>
					<li><a href="#" onclick="candidates();">candidates</a></li>
					<li><a href="#" onclick="vacancies();">vacancies</a></li>
					<li><a href="#" onclick="monitoring();">monitoring</a></li>
				</ul>
			</li>
			<li>
				<a href="#">assistance |</a>
				<ul>
					<li><a href="#" onclick="punchio();">punch in/out</a></li>
				</ul>
			</li>
			<li><a href="exit.php">exit</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="frame" style="position: relative; left: -50px;">
		<iframe src="" id="iff" style="display: none; width: 950px; height: 500px; z-index: -10;" frameborder="0" ></iframe>
	</div>
	<div id="content">
		<div class="post">
			<h1 class="title">
			<br/ >
			<?php
				$tbl_name="users";
				$sql="SELECT * FROM $tbl_name where id='$le_user_id'";
				$result=mysql_query($sql);
				$row = mysql_fetch_object($result);
				echo $row->name . ', welcome to the future of RH ERP\'s!';
			?>
			
			</h1>
			
			<div class="entry">
				
			</div>
			<div class="meta">
			</div>
		</div>
	</div>
	<!-- end content -->
	
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal">(c) 2012 LE ERP </p>
</div>
<!-- end footer -->
</body>
</html>
