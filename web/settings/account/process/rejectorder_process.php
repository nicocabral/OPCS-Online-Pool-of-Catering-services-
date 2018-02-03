<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['oid']);
$query = mysql_query("UPDATE tbl_orders SET order_status = 'Rejected' WHERE orderid = '$getId'") or die (mysql_error());?>