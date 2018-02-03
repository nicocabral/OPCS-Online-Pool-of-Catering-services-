<?php 
session_start();
include('../includes/connection.php');
$getID = intval($_GET['id']);
	$query = mysql_query("UPDATE tbl_catererregistration SET c_regStat = 'Deactivated', c_regDate = curdate() WHERE c_cid = '$getID'") or die (mysql_error());
	if($query == true ){
		echo 'Deactivated';
		}else {
			echo
			mysql_error();}
	
?>
 
