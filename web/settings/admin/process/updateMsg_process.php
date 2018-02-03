<?php session_start();
include('../includes/connection.php');
$getMid = intval($_GET['id']);
$query = mysql_query("UPDATE tbl_message SET m_status = 'Read' WHERE mid = '$getMid'") or die (mysql_error());
if($query == true){
	echo 'Message mark as read';}else {
		echo mysql_error();}?>