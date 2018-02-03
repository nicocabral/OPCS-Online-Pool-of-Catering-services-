

<?php session_start();
include('includes/mysql.php');
$id = intval($_SESSION['id']);
$query = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id = '$id' order by food_offered ") or die (mysql_error());
while($row=mysql_fetch_array($query)){?>
<tr>
	
	<td><?php echo $row['food_offered']?></td>
	<td><?php echo $row['food_category']?></td>
	<td><center><img src="<?php echo $row['images']?>" class="img-responsive img-thumbnail" id="img" width="200px;" style="height:110px;"></center></td>
	<td>
	<center>
	<div class="btn-group">
		<button class="btn btn-danger btn-sm" onclick="deleteoffered(<?php echo $row['fo_id']?>)" type="button"><i class="fa fa-trash"></i></button>
	</div>
	</center></td>
</tr>

<?php }?>
 <!-- Page related js-->
        