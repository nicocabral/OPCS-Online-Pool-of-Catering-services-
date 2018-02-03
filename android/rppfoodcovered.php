<?php 
$result = array();
$result1 = array();
include('database.php');
$oid = intval($_GET['oid']);
$sql = "SELECT * FROM tbl_foodcovered WHERE s_foid = '$oid'";

$res = mysql_query($sql) or die (mysql_error());


while($row = mysql_fetch_array($res)){
         $result[] = $row;
}


header('Content-type: application/json');
echo json_encode($result);


?>