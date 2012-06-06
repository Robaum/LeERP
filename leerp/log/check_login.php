<?php
session_start();
include("connect.php");
$tbl_name="users"; // Table name

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
// Connect to server and select database.
$result=mysql_query($sql);

$count=mysql_num_rows($result);
$row = mysql_fetch_object($result);

if($count==1){
$_SESSION['id'] = $row->id;
header("location:exito.php");
}
else {
header("location:index.php?e=1");
}
?>
