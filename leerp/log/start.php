<?php
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
$le_type = mysql_real_escape_string(stripslashes($_POST['type']));
$le_with = mysql_real_escape_string(stripslashes($_POST['with']));
$le_client = mysql_real_escape_string(stripslashes($_POST['client']));
date_default_timezone_set('America/New_York');
$today = date('Y-m-d H:i:s') ;
$inicio = date("Y-m-d H:i:s");
$tbl_name="registros";
$sql="INSERT INTO $tbl_name (id, le_date, time_in, time_out, type, le_with, client, comments, user_id) VALUES (NULL, '$today', '$inicio', '', '$le_type', '$le_with', '$le_client', '', $le_user_id);";
mysql_query($sql) or die(mysql_error());
$le_idd = mysql_insert_id();


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
<title>Time Log</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript">
var Timer = function()
{        
    // Property: Frequency of elapse event of the timer in millisecond
    this.Interval = 1000;
    
    // Property: Whether the timer is enable or not
    this.Enable = new Boolean(false);
    
    // Event: Timer tick
    this.Tick;
    
    // Member variable: Hold interval id of the timer
    var timerId = 0;
    
    // Member variable: Hold instance of this class
    var thisObject;
    
    // Function: Start the timer
    this.Start = function()
    {
        this.Enable = new Boolean(true);

        thisObject = this;
        if (thisObject.Enable)
        {
            thisObject.timerId = setInterval(
            function()
            {
                thisObject.Tick(); 
            }, thisObject.Interval);
        }
    };
    
    // Function: Stops the timer
    this.Stop = function()
    {            
        thisObject.Enable = new Boolean(false);
        clearInterval(thisObject.timerId);
    };

};
var index = 0;
var minutos = 0;
var horas = 0;
var obj = new Timer();
obj.Interval = 1000;
obj.Tick = timer_tick;
obj.Start();

function timer_tick()
{
	index  = index + 1;
	if(index == 60 ){
		minutos = minutos + 1;
		index = 0;
	}
	if(minutos ==60 ){
		horas = horas + 1;
		minutos=0;
	}
	document.getElementById("div1").innerHTML =horas +"h : " + minutos + "m : " + index + "s";
}

</script>

</head>
<body onload='timer_tick();'>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><img src="logo2.png" /></h1>
	</div>
	<div id="menu">
		<ul>
			<li class="active"><a href="exito.php">time log</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title">
			<?php
				$tbl_name="users";
				$sql="SELECT * FROM $tbl_name where id='$le_user_id'";
				$result=mysql_query($sql);
				$row = mysql_fetch_object($result);
				echo $row->name . ', your session has been started!';
			?>
			
			</h1>
			
			<div class="entry">
				<form name="le_form" method="post" action="stop.php">
					<table width="100%" border="0" cellpadding="3" cellspacing="1" >
						<tr>
							<td colspan="3">
								<div id="div1" style="font-size: 100px; text-align: center;"></div>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								&nbsp;
							</td>
						</tr>
						<tr>
							<td style="text-align: right;" valign="top">Topic/Comments</td>
							<td valign="top">:</td>
							<td><textarea name="comments" rows="4" cols="48" id="comments"></textarea></td>
						</tr>
						<td colspan="3">
								&nbsp;
							</td>
						<tr style="text-align: center;">
							<td colspan="3">
								<input type="submit" name="Submit" value="Finish" style="font-size: 20px;">
								<input type="hidden" name="le_id" value="<?php echo $le_idd; ?>">
							</td>
						</tr>
			
					</table>
				</form>
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
	<p id="legal">(c) 2012 G.O. Consulting LLC. </p>
</div>
<!-- end footer -->
</body>
</html>
