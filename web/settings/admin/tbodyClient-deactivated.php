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
   <table id="datatable-fixed-col" width="100%;" class="table table-hover table-striped table-condensed">
                                    <thead>
                                        <tr class="bg-danger">
                                            <th style="text-align:center; width:auto; color:#FFF;">Company Name</th>
                                            <th style="text-align:center; width:auto; color:#FFF;">Email</th>
                                            <th style="text-align:center; width:auto; color:#FFF;">Contact</th>
                                            <th style="text-align:center; width:auto; color:#FFF;">Start Date</th>
                                            <th style="text-align:center; width:auto; color:#FFF;">Status</th>
                                          
                                        </tr>
                                    </thead>

                                    <tbody >
<?php 
//query///

include('includes/connection.php');
$class = 'warning';
$classl='';
$countdays = '';
$disable = '';
$creg_stat = '';
$stat = '';
$getque = mysql_real_escape_string(trim($_GET['q']));
if($getque == 'Available' || $getque ==""){
	header("location:tbodyClient");
	}else{
	$query = "SELECT tbl_catererinfo.*,tbl_catererregistration.c_reg,tbl_catererregistration.c_cid,tbl_catererregistration.c_regDate,
			  tbl_catererregistration.c_regStat, DATEDIFF(curdate(),tbl_catererregistration.c_regDate) as datediff FROM tbl_catererinfo 
			  LEFT JOIN tbl_catererregistration ON
			  tbl_catererinfo.cid = tbl_catererregistration.c_cid WHERE tbl_catererregistration.c_regStat = '$getque' order by c_regDate";}
			  
	$queryres = mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($queryres)>0){
		while($row = mysql_fetch_assoc($queryres)){
			if($row['datediff']==31 || $row['datediff']==-31){
				$datediff = $row['datediff'];
					$sqlupdatequery = mysql_query("UPDATE tbl_catererregistration  SET c_regStat = 'Un-Available' WHERE datediff = 31") or die (mysql_error());
					$class= "danger";
					$countdays = $datediff-(-31);
				}else if($row['datediff'] ==31){
					$classl = 'danger';}
					else if($row['datediff']>=25){
					$classl = 'warning';	}
					else {
						$classl='success';}
	if($row['c_regStat']=='Deactivated'){
		$isdate = new DateTime($row['c_regDate']);
		$classl = 'danger';
		$disable = 'disabled';
		
		$creg_stat = $row['c_regStat'].'<br><label class="label label-'.$classl.'"> On '.
		$isdate->format('M d, Y');
		}else {
			$disable = 'enable';
			$classl='success';
			$creg_stat = $row['c_regStat'].'<br><label class="label label-'.$classl.'">'.$row['datediff'].' day(s) from Start date</label>';
			}
			
?>
<tr style="cursor:pointer;" class="<?php echo $class;?>" ondblclick="dataOption(<?php echo $row['cid']?>);">

<td  style="text-align:left; width:auto; font-size:14px; color:#000;"><?php echo $row['c_name'];?></td>
<td style="text-align:center; width:auto; font-size:14px; color:#000;"><?php echo $row['c_email'];?></td>
<td style="text-align:center; width:auto; font-size:14px;color:#000;"><?php echo $row['c_contact'];?></td>
<td style="text-align:center; width:auto; font-size:14px; color:#000;"><?php
if($row['c_regStat']=='Deactivated'){
	echo '0000-00-00';}
	else {
		 $date = new DateTime($row['c_regDate']); 
		echo $date->format('M d, Y');
		}?></td>
<td style="text-align:center; width:auto; font-size:14px; color:#000;"><?php echo $creg_stat;
												
										?></td>
</tr>

<?php 
include('updateClientModal.php');
include('optionModal.php');?>

<?php }
	}
	?>
    
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