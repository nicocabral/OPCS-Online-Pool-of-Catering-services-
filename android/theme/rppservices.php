<link rel="stylesheet" href="themes/cabral.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="magnific-popup/css/magnific-popup.css" />
	<link rel="stylesheet" href="fonts.css" />
	<link rel="stylesheet" href="fonts.css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="jquery.mobile.datepicker.css" />
<link rel="stylesheet" href="themes/jquery.mobile.structure-1.4.5.min.css" />
	<link rel="stylesheet" href="themes/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="themes/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="sweetalert/sweet-alert.css" />
	<link rel="stylesheet" href="css/style.css" />
<script src="themes/jquery.mobile-1.4.5.min.js"></script>
	<script src="jquery.mobile.datepicker.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	<!-- home page -->
  <?php include('../database.php');
$oid = intval($_GET['oid']);
$cid = intval($_GET['cid']);
$sql = "SELECT tbl_ocasioncat.*,tbl_servicescovered.* FROM tbl_servicescovered
        LEFT JOIN tbl_ocasioncat ON tbl_servicescovered.s_oid = tbl_ocasioncat.oid WHERE tbl_servicescovered.s_oid = '$oid' AND catererid = '$cid'
        GROUP by tbl_servicescovered.packageno";

$res = mysql_query($sql) or die (mysql_error());
if(mysql_num_rows($res)){
while($row = mysql_fetch_array($res)){
         
?> 
<div data-role="collapsible">
        <h3><?php echo $row['ocassion_name']?> <i class="fa fa-at"></i> &#8369;<?php echo number_format($row['packageprice'],2,'.',',');?></h3>
    <table width="100%;">
	<thead>
	<tr>
		<th>Services covered<hr></th>
			
	</tr>
	
	</thead>
	<tbody>
	
			<?php include('../database.php');
			$query = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$oid' AND catererid='$cid'") or die (mysql_error());
			while($rows = mysql_fetch_array($query)){
				echo '<tr><td><p>'.$rows['covered'].'<i class="fa fa-check" style="color:#228B22;"></i></p></td></tr>';
			}?>
			<tr>
		<th>Food covered<hr></th>
	</tr>
			<?php include('../database.php');
			$query = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$oid' AND f_catid='$cid' order by foodcovered") or die (mysql_error());
			while($rows = mysql_fetch_array($query)){
				echo '<tr><td><p>'.$rows['foodcovered'].'<i class="fa fa-check" style="color:#228B22;"></i></p></td></tr>';
			}?>
			
		
	
	<tr>
		<?php include('../database.php');
		$reserve = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$oid' AND f_catid='$cid' group by fpackageno LIMIT 1") or die (mysql_error());
		while($resrow = mysql_fetch_array($reserve)){ ?>
		<td colspan="2"><a onclick="reserve(<?php echo $resrow['s_foid']?>,<?php echo $resrow['fpackageno'];?>,'<?php echo $row['ocassion_name']?>','<?php echo $resrow['fpackageprice']?>','<?php echo $row['description']?>',<?php echo $row['mycid']?>)" class="ui-btn ui-corner-all"><i class="fa fa-check"></i> Reserve</a></td>
<?php } ?>
	</tr>
	</tbody>
</table>
    </div>

<?php }
}else {
	echo '<center><p style="color:red;">No available services</p></center>';
}

?>





