<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['resid']);
$query = mysql_query("DELETE FROM tbl_reservation WHERE reservationid = '$getId'") or die (mysql_error());

?>