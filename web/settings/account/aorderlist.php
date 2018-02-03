<?php session_start();
include('includes/mysql.php');
$stat = '';
$class='';
$query = mysql_query("SELECT * FROM tbl_adon WHERE addOn_catID = '".$_SESSION['id']."'") or die (mysql_error());
while($row = mysql_fetch_array($query)){
	if($row['addOn_stat'] == 'Available'){
		$stat = '<i class="fa fa-check" style="color:#228B22"></i>';
		$class='';
	}
	else {
		$class='danger';
		$stat = '<i class="fa fa-times-circle" style="color:#821a1a"></i>';
	}?>
<tr class="<?php echo $class;?>" style="color:#000;">
	<td>
	<img src="<?php echo $row['a_images']?>" class="img-responsive" width="50px;">
	</td>
	<td><?php echo $row['addOn_name'].' '.$stat;?></td>
	<td>&#8369;<?php echo number_format($row['addOn_price'],2,'.',',');?></td>
	<td>
	<center>
		<div class="btn-group">
			
			<button class="btn btn-danger btn-sm" onclick="deleteorderdes(<?php echo $row['adonID']?>)"><i class="fa fa-trash"></i></button>
		</div>
	</center>
	</td>
</tr>

<?php }?>