<?php session_start();
include('../includes/connection.php');
	$getid = intval($_GET['id']);
	$getDate = mysql_real_escape_string(trim($_GET['date']));
	$sql = mysql_query("UPDATE tbl_catererregistration SET c_regStat = 'Available',c_regDate = '$getDate' WHERE c_cid = '$getid'") or die (mysql_error());
	$sqlquery = mysql_query("INSERT INTO tbl_regpayment VALUES(NULL,'$getid','500','$getDate','Paid')") or die (mysql_error());
	
?>