<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
$info = array();
if (file_exists('g_i.xml')) {
    $string = file_get_contents('g_i.xml');
    $xml = simplexml_load_string($string);
    foreach($xml->children() as $child){
    	$info[] =  "" .$child;
    }
}

echo "<h1 class='title'>general information</h1>
<br />
<table>
<tr>
	<td>Organization Name:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='oname' value=\"".$info[0]."\"></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>Number of Employees:</td>
	<td>&nbsp;</td>
	<td>0</td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr>
	<td style='text-align: right;'>Phone:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='phone'  value='".$info[1]."'></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>Fax:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='fax'  value='".$info[2]."'></td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr>
	<td  style='text-align: right;'>email:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='email' value='".$info[3]."'></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>Web Page:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='web'  value='".$info[4]."'></td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr>
	<td  style='text-align: right;'>Address:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='address'  value=\"".$info[5]."\"></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>City:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='city'  value='".$info[6]."'></td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr>
	<td  style='text-align: right;'>State:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='state'  value='".$info[7]."'></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>Country:</td>
	<td>&nbsp;</td>
	<td><input type='text' style='width: 200px;' id='country'  value='".$info[8]."'></td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr>
	<td  valign='top' style='text-align: right;'>ZIP Code:</td>
	<td>&nbsp;</td>
	<td  valign='top'><input type='text' style='width: 200px;' id='zip' value='".$info[9]."'></td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td  valign='top'>Notes:</td>
	<td>&nbsp;</td>
	<td><textarea cols='32' rows='5' id='notes'>".$info[10]."</textarea></td>
</tr>
<tr><td colspan='9'>&nbsp;</td></tr>
<tr><td colspan='9'><center><input type='button' value='Save' onclick='save_xml();'/></center></td></tr>
</table>



";

?>


