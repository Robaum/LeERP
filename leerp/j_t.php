<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>job titles</h1><br/>";

$tbl_name="structure";
$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
echo "<table class='flexme1'>
			<thead>
				<tr>
					<th>Job Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<th>Action</th>
				</tr>
			</thead><tbody>";
while($row = mysql_fetch_object($result)){
	echo "<tr>
		<td>".$row->posicion."</td>
		<td><a href='#' onclick='j_e(".$row->id.");'>Edit</a></td>
	</tr>";


}
echo "</tbody></table>"

?>


