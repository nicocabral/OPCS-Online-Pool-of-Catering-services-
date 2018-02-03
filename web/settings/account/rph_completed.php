<?php session_start();?>

<table id="datatable-fixed-col" width="100%;" class="table table-striped table-bordered" style="box-shadow: 3px 2px 2px #000;cursor:pointer;" >
                                <thead style="color:#FFF;">
                                <tr class="bg-danger" style="background-color:#821a1a;">
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-user"></i> From</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="glyphicon glyphicon-list-alt"></i> Reservation </p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown">&#8369;  Price per head</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-envelope"></i> Message</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa  fa-clock-o"></i> Date of event</p></th>
									<th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa  fa-tasks"></i> Status</p></th>
                                    <th style="width:auto;"><center><p style="color:#FFF;" class="wow fadeInDown"><i class="fa fa-gear"></i></p></center></th>
                                </tr>
                                </thead>
                               <tbody id="reservation_res" class="wow fadeInDown">
								<?php include('includes/mysql.php');
								
								$query = 'SELECT * FROM tbl_customereservation WHERE res_mycatid ='.$_SESSION['id'].' AND res_status = "Completed"';
								$res  = mysql_query($query) or die (mysql_error());
								if(mysql_num_rows($res)>0){
									while($row = mysql_fetch_assoc($res)){?>
								<tr class="wow fadeInDown" style="color:#000;">
									<td style="width:auto;">
										<?php echo $row['res_name'].'<br>';?>
									</td>
									<td style="width:auto;"><?php echo $row['eventname']?></td>
									<td style="width:auto;"><center><?php echo '&#8369;'.number_format($row['res_price'],2,'.',',');?></center></td>
									<td style="width:auto;"><p class="m-t-0"><?php echo $row['res_message']?></p></td>
									<td style="width:auto;">
									<?php echo $row['res_date'].'&nbsp;'.$row['res_time'];?></td>
									<td style="width:auto;">
										<p class="label label-success" style="font-size:13px;"><?php echo $row['res_status'];?></p>
									</td>
									<td>
									<center>
									<div class="btn-group">
									<button class="btn btn-danger btn-sm waves-effect waves-light" style="background-color:#821a1a;" onclick="viewRph(<?php echo $row['cusres_id']?>,<?php echo $row['res_price']?>,'<?php echo $row['eventname']?>',<?php echo $row['people_covered']?>,'<?php echo $row['total_res']?>','<?php echo $row['res_name']?>','<?php echo $row['re_contact']?>','<?php echo $row['res_email']?>','<?php echo $row['res_address']?>','<?php echo $row['res_date']?>','<?php echo $row['res_time']?>','<?php echo $row['res_message']?>',<?php echo $row['res_mycatid']?>,'<?php echo $row['res_status']?>');"><i class="fa fa-search"></i> View</button>
									</div></center>
</td>
								</tr>

								<?php }}?>
                                </tbody>
                            </table>
				<script>
							var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollCollapse: true,
                    paging: true,
                   
                });
		 TableManageButtons.init();
function viewRph(resid,price,eventname,pcovered,total,name,no,email,address,date,time,msg,cid,stat){
	$(document).ready(function(){
	$('#viewReservationModal').modal('show');
	$('#resdetails').html('<table class="table table-condensed table-striped" width="100%"><thead><tr><th colspan="2"><center><i class="fa fa-user"></i> Reservation per head</center></th></tr><th style="text-align:center"></th><th style="text-align:center"></th></thead><tbody><tr><td>From</td><th>'+name+'</th></tr><tr><td>Contact #</td><th>'+no+'</th></tr><tr><td>Email</td><th>'+email+'</th></tr><tr><td>Address</td><th>'+address+'</th></tr><tr><td>Reservation details</td><td>Service:&nbsp; <strong>'+eventname+'</strong><br>Package price: &#8369;<strong>'+price.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</strong><br>Event date: <strong>'+date+'&nbsp;'+time+'</strong></td></tr><tr><td><strong>Food covered</strong></td><th><ul style="list-style-type:none;"><li id="foodcovered"></li></ul></th></tr><tr><td>Message</td><th>'+msg+'</th></tr><tr><td>Status</td><th><p class="label label-success">'+stat+'</p></th></tr></tbody></table><div class="col-sm-6"></div><div class="col-sm-6"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleterph('+resid+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printcontent_rph('+resid+')"><i class="fa fa-print"></i> Print</button></div></div>')
	});
	$.ajax({
		url:'rphFoodcovered?resid='+resid,
		type:'GET',
		cache:false,
		success:function(html){
			$('#foodcovered').html(html);
		}
	})
	return false;
}
function delRph(resid){
	swal({
  title: "Confirmation",
  text: "Are you sure you want to delete this reseravtion?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: true
},
function(){
 $.ajax({
		url:'process/delRph_process?resid='+resid,
		type:'POST',
		cache:false,
		success:function(data){
			$('#viewReservationModal').modal('hide');
			var c=1;
			setInterval(function(){
				if(c==0){
					showFilterrph('pending');
				}
				c--;
			},200);
		}
	});
});
	
	return false;
}
function printcontent_rph(resid){
	$('#loader').fadeIn();
	var c=1;
	setInterval(function(){
		if(c==0){
		window.open("printcontent_rph?resid="+resid,"width=800,height=300,0,status=0,");	
		$('#loader').fadeOut();
		}
		c--;
	},500);
	
	return false;
}


		 </script>