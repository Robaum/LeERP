<?php
session_start();
if(isset($_SESSION['id'])){
	header("location:exito.php");
}
if(!isset($_GET['e'])){
	$_GET['e'] = 0;
}
include("connect.php");


?>

<html>
	<head>
	<style>
		* {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			}
			
		body {
			margin: 0;
			pading: 0;
			color: #fff;
			background: url('bg-login.png') repeat #1b1b1b;
			background-position:0px 100px;
			font-size: 14px;
			text-shadow: #050505 0 -1px 0;
			font-weight: bold;
		}
		#le_logo{
			background-color: #ffffff;
			height: 200px;
		}
		.input_text {
			padding:10px 10px;
			width:200px;
			background:#262626;
			border-bottom: 1px double #333333;
			border-top: 1px double #333333;
			border-left:1px double #333333;
			border-right:1px double #333333;
			color: white;
		}
	</style>
	</head>
	<body>
		<div id="le_logo">
			<br />
			<br />
			<br />
			<center><img src="logo.png"/></center>
		</div>
		<br />
		<?php
			if($_GET['e'] == 1){
				echo "<center><font style='font-size: 20px;' color='red'>Anyone can misspell a word, try again!</font></center>";
			}else{
				echo "<br />";
			}
		?>
		<br />
		<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" >
			<tr>
				<form name="form1" method="post" action="check_login.php">
				<td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" >
						<tr>
							<td colspan="3" style="font-size: 20px;"><center><strong><u>Member Login</u></strong></center></td>
						</tr>
						<tr>
							<td colspan="3"><center>&nbsp;</center></td>
						</tr>
						<tr>
							<td width="78">Username</td>
							<td width="6">:</td>
							<td width="294"><input name="myusername" type="text" id="myusername" class="input_text"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input name="mypassword" type="password" id="mypassword" class="input_text"></td>
						</tr>
						<tr>
							<td colspan="3"><center>&nbsp;</center></td>
						</tr>
						<tr style="text-align: center;">

							<td colspan="3"><input type="submit" name="Submit" value="Login" style="font-size: 20px;"></td>
						</tr>
					</table>
				</td>
				</form>
			</tr>
		</table>
	</body>
</html>