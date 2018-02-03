<?php 
$result = array();
include('database.php');
$id = intval($_GET['id']);
$sql = "SELECT tbl_catererinfo.*,tbl_catererservices.* FROM tbl_catererinfo LEFT JOIN tbl_catererservices 
        ON tbl_catererinfo.cid = tbl_catererservices.myid WHERE tbl_catererservices.c_servicesLocid = '$id'";
$res = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($res)>0){
while($row = mysql_fetch_array($res)){
    $result[] = $row;
}
}
else {
$result["message"] = "No available caterers.";
}
header('Content-type: application/json');
echo json_encode($result);
?>