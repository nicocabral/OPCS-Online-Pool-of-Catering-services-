<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['orderid']);
$query = mysql_query("UPDATE tbl_orders SET order_status = 'Pending' WHERE orderid = '$getId'") or die (mysql_error());?>