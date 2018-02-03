<option data-icon="fa fa-search"> Select your location</option>
<?php include('includes/connection.php');
	$query = mysql_query("SELECT * FROM tbl_townloc order by town") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_assoc($query)){
			?>
            <option value="<?php echo $row['cityid']?>"><?php echo $row['town'];?></option>
            <?php 
			}
		
		}
?>