<?php
header('Content-type: text/xml');
include("connect.php");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
$sql="SELECT * FROM structure";
$result=mysql_query($sql);
echo "<available>";
while($row = mysql_fetch_object($result)){
	$sql2= "SELECT * FROM info_jobs where id_structure=" . $row->id;
	$result2=mysql_query($sql2);
	if(mysql_num_rows($result2) == 0){
		echo "<job>";
		$sql3= "SELECT * FROM jt where id_structure=" . $row->id;
		$result3=mysql_query($sql3);
		$rowd = mysql_fetch_object($result3);
		echo "<position>".htmlspecialchars($row->posicion)."</position>";
		if($rowd->description == "")
			echo "<description/>";
		else
			echo "<description>".htmlspecialchars($rowd->description)."</description>";
		if($rowd->notes == "")
			echo "<notes/>";
		else
			echo "<notes>".htmlspecialchars($rowd->notes)."</notes>";
		echo "</job>";
	}
}
echo "</available>";
?>
