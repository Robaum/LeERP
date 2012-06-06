<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}

$current ="<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<generalinfo>
	<organization_name>".htmlentities($_POST['oname'])."</organization_name>
	<phone>".htmlentities($_POST['phone'])."</phone>
	<fax>".htmlentities($_POST['fax'])."</fax>
	<email>".htmlentities($_POST['email'])."</email>
	<web_page>".htmlentities($_POST['web'])."</web_page>
	<address>".htmlentities($_POST['address'])."</address>
	<city>".htmlentities($_POST['city'])."</city>
	<state>".htmlentities($_POST['state'])."</state>
	<country>".htmlentities($_POST['country'])."</country>
	<zip_code>".htmlentities($_POST['zip'])."</zip_code>
	<notes>".htmlentities($_POST['notes'])."</notes>
</generalinfo>";

file_put_contents("g_i.xml", $current);

echo "<h1 class='title'>The info was succesfully saved! :)</h1><br /><br />
<center><input type='button' value='Back' onclick='g_i();'></center>
";
?>