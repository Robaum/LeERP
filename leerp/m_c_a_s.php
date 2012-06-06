<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
 $sql= "INSERT INTO  `monitoreo` (
`id` ,
`candidate_id` ,
`notes` ,
`i_date`
)
VALUES (
NULL ,  '".$_POST['id']."',  '".$_POST['note']."',  CURRENT_TIMESTAMP
);

";
mysql_query($sql);


echo "<h1 class='title'>interview information: saved!</h1><br/>
<input type='button' value='back!' onclick=' monitoring();'>";
?>
