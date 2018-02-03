<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['resid']);
$query = mysql_query("UPDATE tbl_reservation SET res_status = 'Rejected' WHERE reservationid = '$getId'") or die (mysql_error());

?>