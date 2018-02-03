<?php 
session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else {

include('includes/connection.php');
//$id = intval($_SESSION['adminID']);
if(isset($_GET['q'])){
	$filter = mysql_real_escape_string(trim($_GET['q']));
	$sqlquery = "SELECT * FROM tbl_catererinfo WHERE c_name LIKE '%$filter%' AND c_status = 'New'";
}else{
$sqlquery = "SELECT * FROM tbl_catererinfo WHERE c_status = 'New' LIMIT 10";
}
$sqlresult = mysql_query($sqlquery) or die (mysql_error());
if(mysql_num_rows($sqlresult)>0){
	while($row = mysql_fetch_assoc($sqlresult)){
	
?>
<tr style="cursor:pointer;">
	
    <td style="text-align:center;"><?php echo '<u>'.$row['c_name'].'</u><br>';
													 echo 'By : '.$row['c_owner']?></td>
    <td style="text-align:center;"><?php echo $row['c_email'];?></td>
    <td style="text-align:center;"><?php echo $row['c_contact'];?></td>
    <td style="text-align:center;"><?php echo $row['c_address'];?></td>
    <td style="text-align:center;"><label class="label label-info"><?php echo $row['c_status'];?></label></td>
    <td style="text-align:center;">
    <div class="btn btn-group">
    <a href="javascript:void(0);" onclick="viewData(<?php echo $row['cid']?>);"class="btn btn-default btn-sm waves-effect waves-light" style="border-radius:0;">
    <i class="fa fa-search"></i> View</a> 
    <a href="javascript:void(0);" onclick="delRequest(<?php echo $row['cid']?>);" class="btn btn-danger btn-sm waves-effect waves-light" style="border-radius:0;">
    <i class="glyphicon glyphicon-trash"></i>  Del</a>
    </div> 
    </td>

<?php include('regModal.php');?>
</tr>


<?php }
}
else {echo '<tr><td colspan="6"><center><strong style="color:red;">Showing 0 out of 0 result </strong></center></td></tr>';}
	}?>
