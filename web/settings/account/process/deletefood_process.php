<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_foodoffered WHERE fo_id = '$getId'") or die (mysql_error());?>