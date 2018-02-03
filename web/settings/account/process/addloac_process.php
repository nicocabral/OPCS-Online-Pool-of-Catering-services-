<?php session_start();
include('../includes/mysql.php');
$getLocid = intval($_GET['id']);
$check = mysql_query("SELECT * FROM tbl_catererservices WHERE c_servicesLocid = '$getLocid' AND myid = '".$_SESSION['id']."'") or die (mysql_error());
if(mysql_num_rows($check)>0){
echo 'Already on the list';
}else {
$query = mysql_query("INSERT INTO tbl_catererservices (cs_id,myid,c_servicesLocid) VALUES (NULL,'".$_SESSION['id']."','$getLocid')")or die (mysql_error());}?>