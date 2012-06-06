<?php
session_start();
include("connect.php");
if(!isset($_SESSION['id'])){
header("location:index.php?e=1");
}
if(!isset($_GET['query'])){
header("location:index.php?e=1");
}
$le_user_id = $_SESSION['id'];
$tbl_name="registros";
$le_query = $_GET['query'];
$sql="SELECT DISTINCT le_with FROM ".$tbl_name." where user_id='".$le_user_id."' and le_with like '%".$le_query."%'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
$le_var = "";
if($count==0){
$le_var="";
}
else{
	if($count==1){
	$row = mysql_fetch_object($result);
	$le_var = "'" . $row->le_with . "'";
	}
	else{
		while($row = mysql_fetch_object($result)){
			$le_var.= "'" . $row->le_with . "',";
		}
		$le_var= substr($le_var, 0, -1);
	}
}
//$arr = array('query' => $le_query, 'suggestions' => '['.$le_var.']');
//echo json_encode($arr, JSON_FORCE_OBJECT );
echo "{query:'".$le_query."',suggestions:[".$le_var."]}";

?>