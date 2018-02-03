 <!-- Sweet Alert -->
        <link href="../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<!-- DataTables -->
        <link href="../../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="../../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		 <link href="../../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<?php 
session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {?>
	 <table id="datatable-fixed-col" width="100%" class="table table-striped table-hover table-condensed">
       <thead>
                                        <tr class="bg-success">
                                  		 <th style="text-align:center; color:#FFF;" >
                                                <p>Avatar</p>
                                            </th>
                                            <th style="text-align:center; color:#FFF;"><p>Name</p></th>
                                            <th style="text-align:center; color:#FFF;"><p>Email</p></th>
                                            <th style="text-align:center; color:#FFF;"><p>Contact</p></th>
                                            <th style="text-align:center; color:#FFF;"><p>Birthdate</p></th>
                                            <th style="text-align:center;  color:#FFF;"><p>Action</p></th>
                                        </tr>
                                    </thead>	
                                    <tbody>
<?php
include('includes/connection.php');
$id = intval($_SESSION['adminID']);
$sqlquery = "SELECT tbl_wtnadmin.*,tbl_wtnadminavatar.avatar_id,tbl_wtnadminavatar.account_id as a_id,tbl_wtnadminavatar.account_avatar FROM tbl_wtnadmin 
								LEFT JOIN tbl_wtnadminavatar ON tbl_wtnadmin.account_id = tbl_wtnadminavatar.account_id 
								WHERE tbl_wtnadmin.account_id != '$id'";

$sqlresult = mysql_query($sqlquery) or die (mysql_error());
if(mysql_num_rows($sqlresult)>0){
	while($row = mysql_fetch_assoc($sqlresult)){
	
?>
<tr style="cursor:pointer;font-size:17px;" class="success">
	<td style="text-align:center; width:200px;"><center><?php 
	if(@$row['account_avatar'] == ""){
	echo '<img src="avatar/avatar.png" class="img-responsive" width="25%">';
	}
	else{
	echo '<img src="'.@$row['account_avatar'].'" class="img-responsive" width="40%">'; 
	}?></center></td>
    <td style="text-align:center;font-size:13px; color:#000;"><p style="font-size:17px;"><?php echo $row['account_name'];?></p></td>
    <td style="text-align:center;font-size:13px; color:#000;"><p style="font-size:17px;"><?php echo $row['account_email'];?></p></td>
    <td style="text-align:center;font-size:13px; color:#000;"><p style="font-size:17px;"><?php echo $row['contact'];?></p></td>
    <td style="text-align:center;font-size:13px; color:#000;"><p style="font-size:17px;"><?php echo $row['b_month'] .' '.$row['b_day'].', '.$row['b_year'];?></p></td>
    <td style="text-align:center;">
    <div class="btn btn-group">
    <a href="#editModal<?php echo $row['account_id']?>" data-toggle="modal" data-target="#editModal<?php echo $row['account_id']?>" class="btn btn-success waves-effect waves-light" style="border-radius:0;"><i class="fa fa-search"></i> View</a><a href="javascript:void(0);" onclick="delRequest(<?php echo $row['account_id']?>);" class="btn btn-danger waves-effect waves-light" style="border-radius:0;"><i class="glyphicon glyphicon-trash"></i>  Delete</a>
    </div> 
    </td>


</tr>
<?php include('editAdminList.php');?>
<?php }
}}
?>
    </tbody>
<table>
	
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