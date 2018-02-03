<?php session_start();
include('../includes/connection.php');
$getID = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_catererinfo WHERE cid = '$getID'") or die (mysql_error());
$query1 = mysql_query("DELETE FROM tbl_catererregistration WHERE c_cid = '$getID'") or die (mysql_error());
$query2 = mysql_query("DELETE FROM tbl_usernameandpassword WHERE catID = '$getID'") or die (mysql_error());
if($query == true && $query1 == true ){
	echo 'Deleted successfully!';}
	else {
		echo mysql_error();}
		
?>