<?php session_start();
include('includes/mysql.php');
$getoid = intval($_GET['oid']);
$getCatid = intval($_GET['catid']);
$getPackno = intval($_GET['packno']);
$query = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$getoid' AND packageno = '$getPackno' AND catererid = '$getCatid'") or die (mysql_error());
while($row = mysql_fetch_array($query)){
	echo '<li><i style="color:red">*</i> '.$row['covered'].'</li>';
}mysql_close($con);?>