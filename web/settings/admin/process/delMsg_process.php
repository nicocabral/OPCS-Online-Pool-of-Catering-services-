<?php session_start();
include('../includes/connection.php');
$getMid = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_message WHERE mid = '$getMid'") or die (mysql_error());
if($query == true){
	echo 'Deleted successfully!';}
	else {
		echo mysql_error();}?>