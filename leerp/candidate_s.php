<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>candidate saved!</h1><br/>";

$sql= "INSERT INTO  `candidates` (
`id` ,
`f_name` ,
`l_name` ,
`picture` ,
`resume` ,
`phone` ,
`twitter` ,
`email` ,
`position_to_reach` ,
`date`
)
VALUES (
NULL ,  '".$_POST['fname']."',  '".$_POST['lname']."',  '".$_POST['picture']."',  '".$_POST['resume']."',  '".$_POST['phone']."',  '".$_POST['twitter']."',  '".$_POST['email']."',  '".$_POST['position']."', 
CURRENT_TIMESTAMP
);
";
$result=mysql_query($sql);

echo "<br/><input type='button' value='back!' onclick='candidates();'>";
?>
