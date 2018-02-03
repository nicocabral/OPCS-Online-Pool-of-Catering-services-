<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['oid']);
$query = mysql_query("DELETE FROM tbl_orders WHERE orderid = '$getId'") or die (mysql_error());?>