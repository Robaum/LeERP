<?php
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
if(!isset($_GET['e'])){
	$_GET['e'] = 0;
}
$le_user_id = $_SESSION['id'];
$tbl_name2="registros";
$sql2="SELECT DISTINCT client FROM ".$tbl_name2." where user_id='".$le_user_id."'";
$result2=mysql_query($sql2);
$count2=mysql_num_rows($result2);
if($count2 == 0){
header("location:exito.php?e=2");
}
date_default_timezone_set('America/New_York');
$le_date = date("m/d/Y");
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
<title>Reports</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<link href="js/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />
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
				echo $row->name . ', it\'s time to get a report?';
			?>
			
			</h1>
			
			<div class="entry">
				<?php
					if($_GET['e'] == 1){
						echo "<center><font style='font-size: 20px;' color='red'>Anyone can select a bad date range, try again!</font></center><br />";
					}else{
						echo "<br />";
					}
				?>
				<form name="le_form" method="post" action="generar.php">
					<table width="100%" border="0" cellpadding="3" cellspacing="1" style="padding-left:50px;">
						<tr>
							<td>Client: <select name="le_client">
							<?php
									$tbl_name="registros";
									$sql="SELECT DISTINCT client FROM ".$tbl_name." where user_id='".$le_user_id."'";
									$result=mysql_query($sql);
									while($row = mysql_fetch_object($result)){
											echo '<option value="'.$row->client.'">&nbsp;&nbsp;'.$row->client.'&nbsp;&nbsp;</option>';
									}
							?>
								</select></td>
						</tr>
						<tr>
							<td>&nbsp;&nbsp;from: <input class="inputDate" id="inputDate" name="inicio" value="<?php echo $le_date;  ?>" /> to: <input class="inputDate" id="le_datee" name="fin" value="<?php echo $le_date;  ?>" /></td>
							<script>
								$('#inputDate').DatePicker({
									format:'m/d/Y',
									date: $('#inputDate').val(),
									current: $('#inputDate').val(),
									starts: 1,
									position: 'bottom',
									onBeforeShow: function(){
										$('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
									},
									onChange: function(formated, dates){
										$('#inputDate').val(formated);
										
									}
								});
								$('#le_datee').DatePicker({
									format:'m/d/Y',
									date: $('#le_datee').val(),
									current: $('#le_datee').val(),
									starts: 1,
									position: 'bottom',
									onBeforeShow: function(){
										$('#le_datee').DatePickerSetDate($('#le_datee').val(), true);
									},
									onChange: function(formated, dates){
										$('#le_datee').val(formated);
										
									}
								});
							</script>
						</tr>
						<tr style="text-align: center;">
							<td >&nbsp;</td>
						</tr>
						<tr style="text-align: center;">
							<td ><input type="submit" name="Submit" value="Generate" style="font-size: 20px;"></td>
						</tr>
						<tr style="text-align: center;">
							<td >&nbsp;</td>
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
