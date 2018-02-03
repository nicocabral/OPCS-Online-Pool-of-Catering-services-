<?php session_start();
include('../includes/mysql.php');
$getId = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_adon WHERE adonID ='$getId'") or die (mysql_error());?>