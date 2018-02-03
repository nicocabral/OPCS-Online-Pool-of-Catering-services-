<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['resid']);
$query = mysql_query("UPDATE tbl_customereservation SET res_status = 'Rejected' WHERE cusres_id = '$getId'") or die (mysql_error());

?>