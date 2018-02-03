 <!-- Sweet Alert -->
        <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<!-- DataTables -->
        <link href="../../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		 <link href="../../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
 <?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else { ?>
 <table id="datatable-fixed-col" width="100%;" class="table table-striped table-hover">
                                    <thead>
                                        <tr class="bg-success">
                                            
                                            <th style="text-align:center;  font-weight:bold; color:#FFF;"><p><i class="fa fa-street-view"></i> Locations</p></th>
                                            <th style="text-align:center;  font-weight:bold; color:#FFF;"><p><i class="fa fa-gear"></i> Action</p></th>
                                        </tr>
                                    </thead>
                                    <tbody>
  <?php 
  include('includes/connection.php');
  $sqlquery = "SELECT tbl_townloc.* , tbl_city.cityid as tc_id, tbl_city.cityname  
					FROM tbl_townloc LEFT JOIN tbl_city ON tbl_townloc.cityid = tbl_city.cityid ";

$sqlresult = mysql_query($sqlquery) or die (mysql_error());
if(mysql_num_rows($sqlresult)>0){
	while($row = mysql_fetch_assoc($sqlresult)){
	
?>
<tr style="cursor:pointer; font-size:14px;" class="success">
	
    <td style="text-align:left;color:#000; font-size:20px;"><i class="fa fa-street-view"></i> <?php echo $row['town'];?></td>
   
    <td style="text-align:center;">
    <div class="btn btn-group">
    <a href="javascript:void(0);" onclick="showEditModal(<?php echo $row['townid']?>)" class="btn btn-default waves-effect waves-light" style="border-radius:0;"><i class="fa fa-edit"></i> Edit </a>
    <a href="javascript:void(0);" onclick="delRequest(<?php echo $row['townid']?>);" class="btn btn-danger waves-effect waves-light" style="border-radius:0;"><i class="glyphicon glyphicon-trash"></i> Delete</a>
    </div> 
    </td>
   
</tr>

<?php include('editloModal.php');?>
<?php }
}
	?>


                                    </tbody>
                                </table>
                                <?php } ?>
 <!-- Sweet-Alert  -->
       <script src="../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
       <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="../../assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="../../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
		<script src="../../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="../../assets/pages/datatables.init.js"></script>
         <script type="text/javascript">
            $(document).ready(function () {
                
             
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
					scrollCollapse: true,
                    paging: true,
                    
                });
            });
            TableManageButtons.init();

        </script>