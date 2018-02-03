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
 <table id="datatable-fixed-col" width="100%" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="success">
                                            
                                            <th style="text-align:center; width:auto; font-weight:bold; color:#000;">Caterer Name</th>
                                            <th style="text-align:center; width:auto; font-weight:bold; color:#000;">Reservation Name</th>
                                            <th style="text-align:center; width:auto; font-weight:bold; color:#000;">Reservation Date</th> 
                                           
                                        </tr>
                                    </thead>

                                    <tbody>
  <?php 
  include('includes/connection.php');
  $sqlquery = "SELECT tbl_reservation.*,tbl_catererinfo.cid,tbl_catererinfo.c_name,tbl_cleints.cleintId,tbl_cleints.clientname FROM tbl_reservation
  				LEFT JOIN tbl_catererinfo ON tbl_reservation.catererid = tbl_catererinfo.cid 
				LEFT JOIN tbl_cleints ON tbl_reservation.clientid = tbl_cleints.cleintId";

$sqlresult = mysql_query($sqlquery) or die (mysql_error());
if(mysql_num_rows($sqlresult)>0){
	while($row = mysql_fetch_assoc($sqlresult)){
	
?>
<tr style="cursor:pointer; font-size:14px;">
	
    <td style="text-align:left; width:auto; color:#000; font-size:14px;"><?php echo $row['c_name'];?></td>
    <td style="text-align:left; width:auto; color:#000; font-size:14px;"><?php echo $row['clientname'];?></td>
    <td style="text-align:left; width:auto; color:#000; font-size:14px;"><?php echo $row['month'].' ',$row['date'].', '.$row['year'];?></td>
   
   
   
</tr>

<?php //include('editloModal.php');?>
<?php }
}
else {echo '<strong style="color:red;">No record found</strong>';}
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