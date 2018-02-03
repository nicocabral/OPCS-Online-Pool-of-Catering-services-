<?php 
$result = array();
include('database.php');
$id = intval($_GET['cid']);
$sql = "SELECT * FROM tbl_ocasioncat WHERE mycid = '$id'";
$res = mysql_query($sql) or die (mysql_error());
while($row = mysql_fetch_array($res)){
$result[] = $row;
}
header('Content-type: application/json');
echo json_encode($result);


?>