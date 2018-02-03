<table class="table table-condensed table-bordered table-striped table-hover" width="100%;" id="datatable-fixed-col">
	<thead style="background-color:#821a1a;">
		<tr style="color:#FFF;">
			<th style="color:#FFF;">Catering services name</th>
			<th style="color:#FFF;">Description</th>
			<th style="color:#FFF;">Status</th>
			<th style="color:#FFF;"><center><i class="fa fa-gear"></i></center></th>
		</tr>
	</thead>
	<tbody>
	<?php session_start();
include('includes/mysql.php');
$query = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '".$_SESSION['id']."'") or die (mysql_error());
$stat = '';
$class='';
while($row = mysql_fetch_array($query)){
	if($row['status']=='Available'){
		$stat = '<i class="fa fa-check" style="color:#228B22"></i>';
		$class="";
	}else {
		$stat = '<i class="fa fa-times-circle" style="color:#821a1a"></i>';
		$class="danger";
	}
?>
<tr style="color:#000;" class="<?php echo $class;?>">
	<td><?php echo $row['ocassion_name']?></td>
	<td><?php echo $row['description']?></td>
	<td><?php echo $row['status'].' '.$stat;?></td>
	<td><center><div class="btn-group">
		<button class="btn btn-danger" onclick="showeditModal(<?php echo $row['oid'];?>,'<?php echo $row['ocassion_name']?>','<?php echo $row['description']?>','<?php echo $row['status']?>')"><i class="fa fa-edit"></i></button>
		<button class="btn btn-inverse" onclick="deletepack(<?php echo $row['oid'];?>,'<?php echo $row['ocassion_name']?>')"><i class="fa fa-trash"></i></button>
	</div></center></td>
	</tr>
<?php }?>
	</tbody>
</table>
<script>
							var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollCollapse: true,
                    paging: true,
                   
                });
		 TableManageButtons.init();</script>
