<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['resid']);
$query = mysql_query("DELETE FROM tbl_customereservation WHERE cusres_id = '$getId'") or die (mysql_error());
$query = mysql_query("DELETE FROM tbl_resfoodordered WHERE custom_resid = '$getId'") or die (mysql_error());


?>