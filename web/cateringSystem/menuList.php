<?php 

$getCat = mysql_real_escape_string($_GET['cat']);
include('../includes/connection.php');

			$sql = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id=".$_GET['id']." AND food_category = '$getCat' order by food_offered") or die (mysql_error());
			if(mysql_num_rows($sql)>0){
			while($rows = mysql_fetch_array($sql)){?>
				<tr style="cursor:pointer;" ondblclick="addFood(<?php echo $rows['fo_id'];?>,'<?php echo $rows['food_offered']?>')"><td><p><i class="fa fa-cutlery" style= "color:green;"></i> <?php echo $rows['food_offered']?></p></td>
				<td><center><a href="javascript:void(0);"><img src="../settings/account/<?php echo $rows['images']?>" class="img-responsive img-thumbnail" width="100px;" style="box-shadow:1px 1px 1px 1px #888888;" id="img"></a></center></td></tr>
			<?php }}else {
					$sql1 = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id=".$_GET['id']." order by food_offered") or die (mysql_error());
			while($rows = mysql_fetch_array($sql1)){?>
				<tr style="cursor:pointer;" ondblclick="addFood(<?php echo $rows['fo_id'];?>,'<?php echo $rows['food_offered']?>')"><td><p><i class="fa fa-cutlery" style="color:green;"></i> <?php echo $rows['food_offered']?></p></td>
				<td><center><a href="javascript:void(0);"><img src="../settings/account/<?php echo $rows['images']?>" class="img-responsive img-thumbnail" width="100px;" style="box-shadow:1px 1px 1px 1px #888888;" id="img"></a></center></td></tr>
			<?php }
			}?>