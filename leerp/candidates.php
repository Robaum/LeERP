<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}

echo "<h1 class='title'>candidates</h1><br/>";
echo "<div style='float: right;position: relative; left: 30px;'><a href='#' onclick='add_candidate();'><table><tr><td><img src='add.png' /></td><td valign='top'>Add</td></tr></table></a></div>";
$sql="SELECT * FROM candidates";
$result=mysql_query($sql);
echo "<table class='flexme3'>
			<thead>
				<tr>
					<th  width='100'>Action</th>
					<th  width='150'>Position</th>
					<th  width='150'>Picture</th>
					<th  width='150'>First Name</th>
					<th  width='150'>Last Name</th>
					<th  width='150'>Resume</th>
					<th  width='150'>Phone</th>
					<th  width='150'>Email</th>
					<th  width='150'>Twitter</th>
					<th  width='150'>Date</th>
				</tr>
			</thead><tbody>";
if(mysql_num_rows($result) == 0){
	echo "<tr><td colspan='9'><b>Sorry bro, no candidates.</b></td></tr></tbody></table>";
}else{	
	while($row = mysql_fetch_object($result)){
		$sql2="SELECT * FROM structure where id=". $row->position_to_reach;
		$result2=mysql_query($sql2);
		$row2 = mysql_fetch_object($result2);
		echo "<tr><td><a href='#' onclick='candidate_e(". $row->id.",\"".$row->picture."\",\"".$row->resume."\");'>Edit Information</a></td>
		<td>".$row2->posicion."</td>";
		if($row->picture =="./uploads/")
			echo "<td>No Picture</td>";
		else
			echo "<td><a class='fancybox' href=' ".$row->picture."'>Show Picture</a></td>";
echo "
		<td>".$row->f_name."</td>
		<td>".$row->l_name."</td>";
		if($row->resume =="./uploads/")
			echo "<td>No Resume</td>";
		else
			echo "<td><a href=' ".$row->resume."'>Download Resume</a></td>";
echo "
		<td>".$row->phone."</td>
		<td>".$row->email."</td>
		<td>".$row->twitter."</td>
		<td>".$row->date."</td>
</tr>
		";
	}
}
?>
