<?php 
$result = array();
$result1 = array();
include('database.php');
$oid = intval($_GET['oid']);
$sql = "SELECT tbl_ocasioncat.*,tbl_servicescovered.* FROM tbl_servicescovered
        LEFT JOIN tbl_ocasioncat ON tbl_servicescovered.s_oid = tbl_ocasioncat.oid WHERE tbl_servicescovered.s_oid = '$oid' 
        GROUP by tbl_servicescovered.packageno";

$res = mysql_query($sql) or die (mysql_error());


while($row = mysql_fetch_array($res)){
         $result[] = $row;
}


header('Content-type: application/json');
echo json_encode($result);


?>