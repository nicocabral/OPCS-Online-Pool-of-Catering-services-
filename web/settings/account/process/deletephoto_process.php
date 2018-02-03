<?php session_start();
include('../includes/mysql.php');
$getid = intval($_GET['id']);
$query = mysql_query("DELETE FROM tbl_pgallery WHERE photoid = '$getid'") or die (mysql_error());?>