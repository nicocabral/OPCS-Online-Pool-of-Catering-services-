<?php 
$locationdata = array();
include('database.php');
$sql = "SELECT * FROM tbl_townloc";
$result = mysql_query($sql) or die (mysql_error());
while($row = mysql_fetch_array($result)){
$locationdata[] = $row;

}
header('Content-type: application/json');
echo json_encode($locationdata);

?>