<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['resid']);
$query = mysql_query("UPDATE tbl_customereservation SET res_status = 'Completed' WHERE cusres_id = '$getId'") or die (mysql_error());
if($query == true){
	echo 'success';
}else {
	echo mysql_error();
}
?>