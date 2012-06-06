<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}


$sql3 = "DELETE FROM employees WHERE id=".$_POST['id'];
mysql_query($sql3);

$sql4 = "DELETE FROM info_jobs WHERE id_employee=".$_POST['id'];
mysql_query($sql4);

echo "<h1 class='title'>Oh well,  c'est la vie!</h1><br/>
<input type='button' value='back!' onclick=' employees();'>";
?>
