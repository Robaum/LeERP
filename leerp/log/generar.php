<?php
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}

$le_user_id = $_SESSION['id'];
date_default_timezone_set('America/New_York');
$le_start = strtotime($_POST['inicio']);
$le_fin = strtotime($_POST['fin']);
$le_client = $_POST['le_client'];
if($le_fin < $le_start){
header("location:reports.php?e=1");
}
$le_date_inicio = date( 'Y-m-d', $le_start );
$le_date_fin = date( 'Y-m-d', $le_fin );



//echo $le_date_inicio . "   " . $le_date_fin . "   ". $le_client;

?>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href="js/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><img src="logo2.png" /></h1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="exito.php">time log</a></li>
			<li class="active"><a href="reports.php">reports</a></li>
			<li><a href="exit.php">exit</a></li>
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
				echo $row->name . ', payday is coming!';
			?>
			
			</h1>
			
			<div class="entry">
				<form name="le_form" method="post" action="start.php">
					<table width="100%" border="0" cellpadding="3" cellspacing="1" >
						<?php
						echo "<tr><td colspan='15' style='text-align: center; font-size: 18px;'>Report from <i><b>$le_date_inicio</b></i> to <i><b>$le_date_fin</b></i></td></tr>";
						echo "<tr style='font-weight:bold; font-size: 14px;background: url(images/img03.gif) repeat-x left bottom;'><td>date</td>
								  <td>&nbsp;</td>
								  <td>time-in</td>
								  <td>&nbsp;</td>
								  <td>time-out</td>
								  <td>&nbsp;</td>
								  <td>total time</td>
								  <td>&nbsp;</td>
								  <td>type</td>
								  <td>&nbsp;</td>
								  <td>with</td>
								  <td>&nbsp;</td>
								  <td>client</td>
								  <td>&nbsp;</td>
								  <td>comments</td>
							  </tr>";
						$tbl_name="registros";
						if($le_date_inicio == $le_date_fin){
							$sql="SELECT * FROM $tbl_name WHERE DATE( le_date ) =  '$le_date_inicio'  AND user_id ='$le_user_id' AND client = '$le_client'";
						}else{
							$sql="SELECT * FROM $tbl_name WHERE DATE( le_date ) BETWEEN '$le_date_inicio' AND '$le_date_fin' AND user_id ='$le_user_id' AND client = '$le_client'";
						}
						$result=mysql_query($sql);
						$le_min_sum = 0;
						$le_sec_sum = 0;
						$le_hr_sum = 0;
						while($row = mysql_fetch_object($result)){
						    $sql2="SELECT * FROM type where id='$row->type'";
						    $result2=mysql_query($sql2);
							$row2 = mysql_fetch_object($result2);
							$datetime1 = date_create($row->time_in);
							$datetime2 = date_create($row->time_out);
							$interval = date_diff($datetime1, $datetime2);
							echo "<tr style='font-size: 12px;background: url(images/img03.gif) repeat-x left bottom;'>
								  <td valign='top'>".date("Y-m-d", strtotime($row->le_date))."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".date("H:i:s", strtotime($row->time_in))."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".date("H:i:s", strtotime($row->time_out))."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".$interval->format('%im %ss')."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".$row2->type."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".$row->le_with."</td>
								  <td>&nbsp;</td>
								  <td valign='top'>".$row->client."</td>
								  <td>&nbsp;</td>
								  <td style='width: 120px;'>".$row->comments."</td>
								  </tr>";
							$le_min_sum = $le_min_sum + $interval->format('%i');
                            $le_sec_sum = $le_sec_sum + $interval->format('%s');							
						}
						?>
					<tr><td colspan='15'>&nbsp;</td></tr>
					<tr><td colspan='12'>&nbsp;</td><td colspan="3" style="text-align: center;">Total: <b> 
					<?php
					    if($le_sec_sum > 60){
							$dmins = floor ($le_sec_sum / 60);
							$le_sec_sum = $le_sec_sum % 60;
							$le_min_sum = $le_min_sum + $dmins;
						}
						if($le_min_sum > 60){
							$dhs = floor ($le_min_sum / 60);
							$le_min_sum = $le_min_sum % 60;
							$le_hr_sum = $le_hr_sum + $dhs;
						}
						echo $le_hr_sum;
						echo "h ";
						echo $le_min_sum;
						echo "m ";
						echo $le_sec_sum;
						echo "s";
					?>
					</b></td></tr>					
					<tr><td colspan='15'>&nbsp;</td></tr>
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
	