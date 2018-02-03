<select class="wow fadeInDown form-control" name="ocasionname" id="oid">
<option value="">Select catering services</option>
<?php session_start();
include('includes/mysql.php');
$query = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '".$_SESSION['id']."'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_array($query)){?>
	<option value="<?php echo $row['oid']?>"><?php echo $row['ocassion_name']?></option>
	
<?php }}?>
</select>