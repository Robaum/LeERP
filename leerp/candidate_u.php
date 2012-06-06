<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
echo "<h1 class='title'>candidate updated!</h1><br/>";

$sql="UPDATE  `candidates` SET  `f_name` =  '".$_POST['fname']."',
`l_name` =  '".$_POST['lname']."',
`picture` =  '".$_POST['picture']."',
`resume` =  '".$_POST['resume']."',
`phone` =  '".$_POST['phone']."',
`twitter` =  '".$_POST['twitter']."',
`email` =  '".$_POST['email']."',
`position_to_reach` =  '".$_POST['position']."' WHERE  `candidates`.`id` =".$_POST['id'].";";

$result=mysql_query($sql);

echo "<br/><input type='button' value='back!' onclick='candidates();'>";
?>
