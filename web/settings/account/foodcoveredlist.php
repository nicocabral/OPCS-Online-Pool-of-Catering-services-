<?php session_start();
include('includes/mysql.php');
$getoid = intval($_GET['oid']);
$getCatid = intval($_GET['catid']);
$getPackno = intval($_GET['packno']);
$query = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$getoid' AND fpackageno = '$getPackno' AND f_catid = '$getCatid'") or die (mysql_error());
while($row = mysql_fetch_array($query)){
	echo '<li><i style="color:red">*</i> '.$row['foodcovered'].'</li>';
}mysql_close($con);?>