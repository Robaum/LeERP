<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>past interview notes</h1><br/>";
$sql="SELECT * FROM candidates where id='".$_POST['id']."'";
$result=mysql_query($sql);
$row = mysql_fetch_object($result);


echo "
	<table>
		<tr>
			<td style='font-size: 14px;' align='right'><b>Candidate Name:</b></td>
			<td>&nbsp;</td>
			<td>".$row->f_name."&nbsp;".$row->l_name." <input type='hidden' id='idd' value='".$_POST['id']."' /></td>
		</tr>
	</table><br />";

$sql="SELECT * FROM monitoreo where candidate_id='".$_POST['id']."'";
$result=mysql_query($sql);
while($row = mysql_fetch_object($result)){

echo "<table style='margin-left: 50px;'>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'><b>Date:</b></td>
			<td>&nbsp;</td>
			<td>".$row->i_date."</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'>Note:</td>
			<td>&nbsp;</td>
			<td>".$row->notes."</td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
";
}

echo "<tr>
			<td style='font-size: 14px;' valign='top' align='right'>&nbsp;</td>
			<td>&nbsp;</td>
			<td  align='right'><input type='button' value='back!' onclick='monitoring();'></td>
		</tr>
	</table>";

?>
