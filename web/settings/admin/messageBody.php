<?php session_start();
include('includes/connection.php');
if(isset($_GET['filter'])){
	$filter = mysql_real_escape_string($_GET['filter']);
	$query = "SELECT * FROM tbl_message WHERE m_from LIKE '%$filter%' OR m_status LIKE '%$filter%' order by m_status";
}
else{
$query = "SELECT * FROM tbl_message  order by m_status";
}
$class='';
$res = mysql_query($query) or die (mysql_error());
if(mysql_num_rows($res)){
	while($row = mysql_fetch_assoc($res)){
		if($row['m_status']=='New'){
			$class='success';
		}
		else {
			$class='inverse';
		}?>
<tr>
	<td><p><center><strong><?php echo $row['m_from']?></strong></center><p></td>
	<td><p><center><?php echo $row['m_content']?></center><p></td>
	<td><p><center><?php echo $row['m_date']?></center><p></td>
	<td><center><p class="label label-<?php echo $class;?>" style="font-size:13px;"><?php echo $row['m_status']?><p></center></td>
	<td><center><button class="btn btn-danger waves-effect waves-light" onclick="viewMsg(<?php echo $row['mid']?>,'<?php echo $row['m_from']?>','<?php echo $row['m_content']?>','<?php echo $row['m_date']?>')">
	<i class="glyphicon glyphicon-eye-open"></i> View</button></center></td>
	
	</tr>

<?php
 }}else {
	echo '<tr><td colspan="5"><center><strong style="color:red;">No record found</strong></center></td></tr>';
}?>