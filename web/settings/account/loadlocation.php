<?php session_start();?>
<div class="wow fadeInDown col-md-6" style="margin-top:10px;" id="locationMenu">
<table id="datatable-fixed-col" width="100%;" class="table table-striped table-bordered wow fadeInDown" style="cursor:pointer;" >
                                <thead style="color:#FFF;">
                                <tr class="wow fadeInDown bg-danger" style="background-color:#821a1a;" >
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-street-view"></i> Locations</p></th>
                                    
                                </tr>
                                </thead>
                               <tbody id="order_res" class="wow fadeInDown">
								<?php include('includes/mysql.php');
								$myid = intval($_SESSION['id']);
								$query = 'SELECT * FROM tbl_townloc  order by town';
								$res  = mysql_query($query) or die (mysql_error());
								$stat = '';
								if(mysql_num_rows($res)>0){
									while($row = mysql_fetch_assoc($res)){
										$check = mysql_query("SELECT  * FROM tbl_catererservices WHERE c_servicesLocid = '".$row['townid']."' AND myid = '".$_SESSION['id']."'") or die (mysql_error());
										if(mysql_num_rows($check)>0){
											$stat = '<i class="fa fa-check" style="color:green;"></i>';
										}else {
											$stat = '';
										}?>
								<tr class="wow fadeInDown" style="color:#000;" ondblclick="addloc(<?php echo $row['townid']?>);">
									<td style="width:auto;">
									<h4>
									<i class="fa fa-street-view"></i>
										<?php echo $row['town'].'&nbsp;'.$stat;?>
										
									</h4>
									</td>
								</tr>

								<?php }}?>
                                </tbody>
                            </table>
						</div>
<div class="wow fadeInDown col-md-6" style="margin-top:10px;" id="locBodylist">

	
</div>
				<script>
							var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollCollapse: true,
                    paging: false,
                   
                });
		 TableManageButtons.init();
function locmenu(){
	$.ajax({
		url:'locnmenu',
		type:'GET',
		cache:false,
		beforeSend:function(){
			$('#locationMenu').html('<h4><center><i class="fa fa-spin fa-spinner"></i></center></h4>');
		},
		success:function(html){
			$('#locationMenu').empty
			$('#locationMenu').html(html);
		}
	});
	return false;
}
		 
function addloc(id){
	$.ajax({
		url:'process/addloac_process?id='+id,
		type:'POST',
		cache:false,
		beforeSend:function(){
			$('#locBodylist').html('<center><h3><i class="fa fa-spin fa-spinner"></i></h3></center>')
		},
		success:function(data){
			if(data == 'Already on the list'){
				swal(data,'','warning');
				loadlist();
			}else {
			var c=1;
			setInterval(function(){
				if(c==0){
					locmenu();
					loadlist();
					
				}
				c--;
			},300);
		}
		}
	});
	return false;
}	 
		 
	</script>