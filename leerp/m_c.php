<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$sql="SELECT * FROM candidates where id=".$_POST['id'];
$result=mysql_query($sql);
$row = mysql_fetch_object($result);

$sql2="INSERT INTO  `employees` (
`id` ,
`f_name` ,
`l_name` ,
`picture` ,
`resume` ,
`phone` ,
`twitter` ,
`email` ,
`position` ,
`date`
)
VALUES (
NULL ,  '".$row->f_name."',  '".$row->l_name."',  '".$row->picture."',  '".$row->resume."',  '".$row->phone."',  '".$row->twitter."',  '".$row->email."',  '".$row->position_to_reach."', 
CURRENT_TIMESTAMP
);";

mysql_query($sql2);

$sql4="INSERT INTO  `info_jobs` (
`id` ,
`id_structure` ,
`id_employee`
)
VALUES (
NULL ,  '".$row->position_to_reach."',  '".mysql_insert_id()."'
);
";

mysql_query($sql4);


$sql3 = "DELETE FROM candidates WHERE id=".$_POST['id'];
mysql_query($sql3);


echo "<h1 class='title'>congratulations you've hired a new employee!</h1><br/>
<input type='button' value='back!' onclick=' monitoring();'>";
?>
