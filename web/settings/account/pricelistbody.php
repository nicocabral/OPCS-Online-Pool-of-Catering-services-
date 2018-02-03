<?php session_start();
include('includes/mysql.php');
$id = intval($_SESSION['id']);
$query = mysql_query("SELECT * FROM tbl_price WHERE mycat_id = '$id' order by p_price") or die (mysql_error());
while($row=mysql_fetch_array($query)){?>
<tr>
	<td>&#8369;<?php echo number_format($row['p_price'],2,'.',',');?></td>
	<td><?php echo $row['des']?></td>
	<td><?php echo $row['minimum']?></td>
	<td>
	<center>
	<div class="btn-group">
		
		<button class="btn btn-danger btn-sm" onclick="deleteprice(<?php echo $row['priceid'];?>)"><i class="fa fa-trash"></i></button>
	</div>
	</center></td>
</tr>

<?php }?>