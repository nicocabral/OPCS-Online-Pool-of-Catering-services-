<table id="datatable-fixed-col1" width="100%;" class="wow fadeInDown table table-bordered table-striped table-hover">
		<thead style="background-color:#821a1a;color:#FFF; margin-top:5px;">
			<tr style="color:#FFF;">
				<th style="color:#FFF;"><i class="glyphicon glyphicon-list-alt"></i> My locations list</th>
				<th style="color:#FFF;"><center><i class="fa fa-gear"></i></center></th>
			</tr>
		</thead>
		<tbody>
			<?php session_start();
include('includes/mysql.php');
$query = mysql_query("SELECT tbl_catererservices.*, tbl_townloc.* FROM tbl_catererservices LEFT JOIN tbl_townloc ON tbl_catererservices.c_servicesLocid = tbl_townloc.townid WHERE myid = '".$_SESSION['id']."'") or die (mysql_error());
if(mysql_num_rows($query)>0){
	while($row = mysql_fetch_array($query)){
?>
<tr>
<td><h4><i class="fa fa-street-view"></i> <?php echo $row['town']?></h4></td>
<td><center><button class="btn btn-danger" style="background-color:#821a1a;" onclick="removeloc(<?php echo $row['cs_id'];?>)">x</button></center></td>
</tr>

<?php }}?>
		</tbody>
	</table>
	<script>
	var table1 = $('#datatable-fixed-col1').DataTable({
                    scrollY: "300px",
                    scrollCollapse: false,
                    paging: false,
                   
                });
		 TableManageButtons.init();
	</script>
