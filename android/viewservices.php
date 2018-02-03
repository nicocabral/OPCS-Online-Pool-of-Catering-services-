<?php

$result = array();
include('database.php');
$getcid = intval($_GET['id']);
$sql = "SELECT tbl_catererinfo.*, tbl_pgallery.* FROM tbl_catererinfo LEFT JOIN tbl_pgallery ON
        tbl_catererinfo.cid = tbl_pgallery.c_caterid WHERE tbl_catererinfo.cid = '$getcid'";
$res = mysql_query($sql) or die (mysql_error());
while($row = mysql_fetch_array($res)){

    $result[] = $row;
}
header('Content-type: application/json');
echo json_encode($result);

?>