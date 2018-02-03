<?php include('database.php');
$getPid = intval($_GET['pid']);
$query = mysql_query("SELECT * FROM tbl_price WHERE priceid = '$getPid'") or die (mysql_error());
if($row = mysql_fetch_array($query)){
    echo '&#8369;'.$row['p_price'].'-'.$row['des'].' kinds of foods (Dessert included)<span class="fa fa-check" style="color:green;"></span><br>Minimum of '.$row['minimum'].' people covered <span class="fa fa-check" style="color:green;"></span>';
    echo '<input type="hidden" value="'.$row['p_price'].'" id="pprice" name="pprice">';
}
?>