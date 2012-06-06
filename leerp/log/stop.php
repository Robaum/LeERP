<?php
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
$le_id = $_POST['le_id'];
$le_user_id = $_SESSION['id'];
date_default_timezone_set('America/New_York');
$fin = date("Y-m-d H:i:s");
$tbl_name="registros";
$le_comments = mysql_real_escape_string(stripslashes($_POST['comments']));
$sql="UPDATE $tbl_name SET time_out='$fin' WHERE id='$le_id'";
$sql2="UPDATE $tbl_name SET comments='$le_comments' WHERE id='$le_id'";
mysql_query($sql) or die(mysql_error());
mysql_query($sql2) or die(mysql_error());
header("location:exito.php");
?>