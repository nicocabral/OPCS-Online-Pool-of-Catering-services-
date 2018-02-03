<?php session_start();
include('../includes/mysql.php');
$getOid = intval($_GET['oid']);
$query = mysql_query("DELETE FROM tbl_ocasioncat WHERE oid = '$getOid'") or die (mysql_error());?>