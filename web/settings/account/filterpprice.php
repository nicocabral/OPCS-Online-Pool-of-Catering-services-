<div class="col-sm-6">
<div class="table-responsive" id="scovlist">
<table class="table table-striped table-condensed" width="100%">
	<thead>
		<tr>
			
			<th>Services covered</th>
			<th><center><i class="fa fa-gear"></i></center></th>
			
		</tr>
	</thead>
<tbody>
	<?php session_start();
include('includes/mysql.php');
$oid = intval($_GET['oid']);
$getPn = intval($_GET['packno']);
$sql = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$oid' AND packageno = '$getPn'") or die (mysql_error());
while($srow = mysql_fetch_array($sql)){
	?>
	<tr>
	
	<td style="color:#000;"><?php echo $srow['covered']?> </td><td><center><button class="btn btn-sm btn-danger" onclick="removescov(<?php echo $srow['serviceID']?>,<?php echo $oid?>);">&times;</button></center></td></tr>
<?php 	
}
?>
</tbody>
</table>
	
</div>
</div>
<div class="col-md-6">
<div class="table-responsive">

<table class="table table-striped table-condensed" width="100%">
	<thead>
		<tr>
			
			<th>Food covered</th>
			<th><center><i class="fa fa-gear"></i></center></th>
			
		</tr>
	</thead>
<tbody>

	<?php 
include('includes/mysql.php');
$oid = intval($_GET['oid']);
$getPn = intval($_GET['packno']);
$sql = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$oid' AND fpackageno = '$getPn' ") or die (mysql_error());
while($frow = mysql_fetch_array($sql)){
	?>
	<tr>
	
	<td style="color:#000;"><?php echo $frow['foodcovered']?> </td><td><center><button class="btn btn-sm btn-danger" onclick="removefcov(<?php echo $frow['foodID']?>,<?php echo $oid?>);">&times;</button></center></td></tr>
<?php 	
}
?>
	
</tbody>
</table>
</div>
</div>