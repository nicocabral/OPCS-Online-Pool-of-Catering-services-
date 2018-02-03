<?php session_start();
include('../includes/mysql.php');
$getoid = intval($_GET['oid']);
$getcid = intval($_GET['catid']);
$getpno = intval($_GET['pno']);
$query = mysql_query("DELETE FROM tbl_servicescovered WHERE s_oid='$getoid' AND catererid = '$getcid' AND packageno = '$getpno'") or die (mysql_error());
$query1 = mysql_query("DELETE FROM tbl_foodcovered WHERE s_foid='$getoid' AND f_catid = '$getcid' AND fpackageno = '$getpno'") or die (mysql_error());?>