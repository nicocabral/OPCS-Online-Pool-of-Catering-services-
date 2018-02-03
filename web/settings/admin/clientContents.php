 <!-- Sweet Alert -->
        <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<!-- DataTables -->
        <link href="../../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		 <link href="../../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<?php  session_start();
if($_SESSION['type']!='admin'){
	header("location:includes/logout_process");
	}else{?>
     <table id="datatable-fixed-col" width="100%" class="table table-bordered table-hover table-striped" >
                                    <thead>
                                        <tr class="bg-success">
                                            <th style="text-align:center; width:auto; color:#FFF; font-size:14px;">Company Name</th>
                                            <th style="text-align:center; width:auto; color:#FFF;font-size:14px;">Contact</th>
                                            <th style="text-align:center; width:auto; color:#FFF;font-size:14px;">Start Date</th>
                                            <th style="text-align:center; width:auto; color:#FFF;font-size:14px;">Status</th>
                                          
                                        </tr>
                                    </thead>

                                    <tbody >
<?php 
//query///

include('includes/connection.php');
$class = '';
$class1 = '';
$countdays = '';

	$query = "SELECT tbl_catererinfo.*,tbl_catererregistration.c_reg,tbl_catererregistration.c_cid,tbl_catererregistration.c_regDate,
			  tbl_catererregistration.c_regStat, DATEDIFF(curdate(),tbl_catererregistration.c_regDate) as datediff FROM tbl_catererinfo 
			  LEFT JOIN tbl_catererregistration ON
			  tbl_catererinfo.cid = tbl_catererregistration.c_cid WHERE tbl_catererregistration.c_regStat = 'Available' order by c_regDate";
			  
	$queryres = mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($queryres)>0){
		while($row = mysql_fetch_assoc($queryres)){
			if($row['datediff']==31 || $row['datediff']==-31){
				$datediff = $row['datediff'];
				$cid = $row['c_cid'];
					$sqlupdatequery = mysql_query("UPDATE tbl_catererregistration  SET c_regStat = 'Deactivated', c_regDate = curdate() WHERE c_cid = '$cid'") or die (mysql_error());
					
					$countdays = $datediff-(-31);
				}
				else if($row['datediff']==27 || $row['datediff']==28 || $row['datediff']==29 || $row['datediff']==30){
					$class="danger";
					$class1="label label-danger";} else {
						$class = '';
						$class1 = 'label label-success';}
			
?>
<tr style="cursor:pointer;" class="<?php echo $class;?>">

<td  style="text-align:left; width:auto; color:black;font-size:14px;"><?php echo $row['c_name'];?></td>
<td style="text-align:center; width:auto; color:black; font-size:14px;"><?php echo $row['c_contact'];?></td>
<td style="text-align:center; width:auto; color:black; font-size:14px;"><?php
$date = new DateTime($row['c_regDate']);
 echo $date->format('M d, Y');?></td>
<td style="text-align:center; width:auto; color:black;"><?php
												 echo '<label class="'.$class1.'" style="font-size:11px;">'.$row['datediff'].' day(s) from Start date</label>'; 
										?></td>
</tr>



<?php }
	}?>
    
                                    </tbody>
                                </table>
     <?php }?>
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
       