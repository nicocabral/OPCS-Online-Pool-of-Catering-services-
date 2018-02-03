<?php session_start();
$getId= intval($_GET['id']);
include('../includes/mysql.php');
$query = mysql_query("DELETE FROM tbl_foodcovered WHERE foodID = '$getId'")or die (mysql_error());?>