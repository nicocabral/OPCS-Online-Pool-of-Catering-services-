<select class="wow fadeInDown form-control"  id="pn">
<option value="">Select package price</option>
<?php session_start();
include('includes/mysql.php');
$query = mysql_query("SELECT * FROM tbl_foodcovered WHERE f_catid = '".$_SESSION['id']."' GROUP by fpackageno") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_array($query)){?>
	<option value="<?php echo $row['fpackageno']?>"><?php echo $row['fpackageprice']?></option>
	
<?php }}?>
</select>