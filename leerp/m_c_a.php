<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>add interview information</h1><br/>";
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
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'><b>Notes:</b></td>
			<td>&nbsp;</td>
			<td><textarea cols='42' rows='5' id='nnotes'></textarea></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'>&nbsp;</td>
			<td>&nbsp;</td>
			<td  align='right'><input type='button' value='save' onclick='monitoring_save();'></td>
		</tr>
	</table>
";

?>
