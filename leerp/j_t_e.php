<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>edit job title</h1><br/>";
$tbl_name="structure";
$sql="SELECT * FROM $tbl_name where id='".$_POST['id']."'";
$result=mysql_query($sql);
$row = mysql_fetch_object($result);

$sql2="SELECT * FROM jt where id_structure='".$_POST['id']."'";
$result2 = mysql_query($sql2);
$to_make = 0;
if(mysql_num_rows($result2)>0){
$row2 = mysql_fetch_object($result2);
$description=$row2->description;
$notes=$row2->notes;
$to_make=1;
}

echo "
	<table>
		<tr>
			<td style='font-size: 14px;' align='right'><b>Job Title:</b></td>
			<td>&nbsp;</td>
			<td>".$row->posicion."<input type='hidden' id='s_id' value='".$_POST['id']."'/></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'><b>Description:</b></td>
			<td>&nbsp;</td>
			<td><textarea cols='42' rows='5' id='ddescription'>".$description."</textarea></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'><b>Notes:</b></td>
			<td>&nbsp;</td>
			<td><textarea cols='42' rows='5' id='nnotes'>".$notes."</textarea></td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;</td>
		</tr>
		<tr>
			<td style='font-size: 14px;' valign='top' align='right'>&nbsp;</td>
			<td>&nbsp;</td>
			<td  align='right'><input type='button' value='save' onclick='save_jt(".$to_make.");'></td>
		</tr>
	</table>
";

?>
