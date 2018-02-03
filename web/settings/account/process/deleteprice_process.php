<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_price WHERE priceid = '$getId'") or die (mysql_error());
?>