<?php session_start();
include('includes/mysql.php');
$query = mysql_query("SELECT * FROM tbl_pgallery WHERE c_caterid = '".$_SESSION['id']."'") or die (mysql_error());
while($row = mysql_fetch_array($query)){?>
<tr style="color:#000;">
	<td><img src="<?php echo $row['p_location']?>" class="img-responsive" width="80px;"></td>
	<td><center><button class="btn btn-danger btn-sm" onclick="delphotos(<?php echo $row['photoid']?>)" type="button"><i class="fa fa-trash"></i></button></center></td>
</tr>
<?php }?>