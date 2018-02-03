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
								$query = 'SELECT * FROM tbl_orders WHERE catererid = "'.$_SESSION['id'].'" AND order_status = "New"';
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
									<button class="btn btn-danger btn-sm waves-effect waves-light"  style="background-color:#821a1a;" onclick="vieworder(<?php echo $row['orderid']?>,<?php echo $row['catererid']?>,'<?php echo $row['order_name']?>','<?php echo $row['order_price']?>','<?php echo $row['order_qty']?>','<?php echo $row['customer_name']?>','<?php echo $row['customer_contact']?>','<?php echo $row['customer_address']?>','<?php echo $row['customer_message']?>','<?php echo $row['order_date']?>','<?php echo $row['order_payment']?>','<?php echo $row['order_status']?>','<?php echo $row['order_timestamp']?>','<?php echo $row['time']?>');"><i class="fa fa-search"></i> View</button>
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
		 TableManageButtons.init();</script>