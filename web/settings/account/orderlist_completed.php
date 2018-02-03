<?php session_start();?>
<table id="datatable-fixed-col" width="100%;" class="table table-striped table-bordered" style="box-shadow: 3px 2px 2px #000;cursor:pointer;" >
                                <thead style="color:#FFF;">
                                <tr class="bg-danger" style="background-color:#821a1a;">
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-user"></i> From</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="glyphicon glyphicon-list-alt"></i> Order</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown">&#8369; Price</p></th>
									<th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"> Qty</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-envelope"></i> Message</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa  fa-clock-o"></i> Order date</p></th>
									<th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-tasks"></i> Status</p></th>
                                    <th style="width:auto;"><center><p style="color:#FFF;" class="wow fadeInDown"><i class="fa fa-gear"></i></p></center></th>
                                </tr>
                                </thead>
                               <tbody id="order_res" class="wow fadeInDown">
								<?php include('includes/mysql.php');
								$query = 'SELECT * FROM tbl_orders WHERE catererid = "'.$_SESSION['id'].'" AND order_status = "Completed"';
								$res  = mysql_query($query) or die (mysql_error());
								if(mysql_num_rows($res)>0){
									while($row = mysql_fetch_assoc($res)){?>
								<tr class="wow fadeInDown" style="color:#000;">
									<td style="width:auto;">
										<?php echo $row['customer_name'].'<br>';?>
									</td>
									<td style="width:auto;"><?php echo $row['order_name']?></td>
									<td style="width:auto;"><center><?php echo '&#8369;'.number_format($row['order_price'],2,'.',',');?></center></td>
									<td style="width:auto;"><center><?php echo number_format($row['order_qty'],2,'.',',');?></center></td>
									<td style="width:auto;"><p class="m-t-0"><?php echo $row['customer_message']?></p></td>
									<td style="width:auto;"><p class="m-t-0"><?php echo $row['order_date'].' '. $row['time']?></p></td>
									<td style="width:auto;">
										<p class="label label-success" style="font-size:13px;"><?php echo $row['order_status'];?><p>
									</td>
									<td>
									<center>
									<div class="btn-group">
									<button class="btn btn-danger btn-sm waves-effect waves-light"  style="background-color:#821a1a;" onclick="vieworder_completed(<?php echo $row['orderid']?>,<?php echo $row['catererid']?>,'<?php echo $row['order_name']?>','<?php echo $row['order_price']?>','<?php echo $row['order_qty']?>','<?php echo $row['customer_name']?>','<?php echo $row['customer_contact']?>','<?php echo $row['customer_address']?>','<?php echo $row['customer_message']?>','<?php echo $row['order_date']?>','<?php echo $row['order_payment']?>','<?php echo $row['order_status']?>','<?php echo $row['order_timestamp']?>','<?php echo $row['time']?>');"><i class="fa fa-search"></i> View</button>
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
function vieworder_completed(o_id,cid,oname,oprice,oqty,cname,cno,cad,cmsg,od,op,os,ot,time){
	var total = parseFloat(oprice)*parseFloat(oqty);
	$('#viewOrderModal').modal('show');
	$('#odetails').html('<center><h4><i class="fa fa-spin fa-spinner"></i></h4></center>');
	var opstat;
	if(op == 'cod')
		opstat = 'Cash on delivery';
	
	else 
		opstat = 'Pickup';
	
	var c=1;
	setInterval(function(){
		if(c==0){
			$('#odetails').empty();
			$('#odetails').html('<table class="table table-striped table-hover table-condensed" style="color:#000;"><thead><tr><th><em>Customer details</em></th><th><span class="pull-right">Order date:'+ot+'</span><br><span class="pull-right">Status:<label class="label label-success">'+os+' <span class="fa fa-check"></span></label></span></th></tr></thead><tbody><tr><td>Customer name</td><th>'+cname+'</th></tr><tr><td>Contact</td><th>'+cno+'</th></tr><tr><td>Address</td><th>'+cad+'</th></tr><tr><td>'+opstat+' <span class="fa fa-check" style="color:#228B22;"></span></td><th>'+od+' '+time+'<span class="fa fa-check" style="color:#228B22;"></span></th></tr><tr><td>Message</td><th>'+cmsg+'</th></tr><tr><th colspan="2"><em>Order details</em></th></tr><tr><td>Order name</td><th>'+oname+'</th></tr><tr><td>Price</td><th>&#8369;'+oprice+'</th></tr><tr><td>Quantity</td><th>'+oqty+'</th></tr><tr><td>Total</td><th>&#8369;'+total.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()+'</th></tr></tbody></table><div class="col-md-4"></div><div class="col-md-8"><div class="btn-group"><button class="btn btn-danger" style="background-color:#821a1a;" onclick="deleteOrder('+o_id+')"><i class="fa fa-trash"></i> Delete</button><button class="btn btn-danger" style="background-color:#821a1a;" onclick="printOrder('+o_id+')"><i class="fa fa-print"></i> Print</button></div></div>');
		}
		c--;
	},200);
	
	return false;
}
		 
		 </script>