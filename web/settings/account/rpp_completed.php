<?php session_start();?>
<table id="datatable-fixed-col" width="100%;" class="table table-striped table-bordered" style="box-shadow: 3px 2px 2px #000;cursor:pointer;" >
                                <thead style="color:#FFF;">
                                <tr class="bg-danger" style="background-color:#821a1a;">
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-user"></i> From</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="glyphicon glyphicon-list-alt"></i> Reservation</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown">&#8369; Package price</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-envelope"></i> Message</p></th>
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa  fa-clock-o"></i> Date of event</p></th>
									<th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa  fa-tasks"></i> Status</p></th>
                                    <th style="width:auto;"><center><p style="color:#FFF;" class="wow fadeInDown"><i class="fa fa-gear"></i></p></center></th>
                                </tr>
                                </thead>
                               <tbody id="reservation_res" class="wow fadeInDown">
								<?php include('includes/mysql.php');
								$filer = mysql_real_escape_string($_GET['filter']);
								$query = 'SELECT tbl_reservation.*,tbl_ocasioncat.* FROM tbl_reservation LEFT JOIN tbl_ocasioncat ON tbl_ocasioncat.oid = tbl_reservation.ocasion_id WHERE tbl_reservation.res_status = "Completed" AND tbl_reservation.catererid ='.$_SESSION['id'].'';
								$res  = mysql_query($query) or die (mysql_error());
								if(mysql_num_rows($res)>0){
									while($row = mysql_fetch_assoc($res)){?>
								<tr class="wow fadeInDown" style="color:#000;">
									<td style="width:auto;">
										<?php echo $row['clientname'].'<br>';?>
									</td>
									<td style="width:auto;"><?php echo $row['ocassion_name']?></td>
									<td style="width:auto;"><center><?php echo $row['servicepackno'].' - &#8369;'.number_format($row['price'],2,'.',',');?></center></td>
									<td style="width:auto;"><p class="m-t-0"><?php echo $row['message']?></p></td>
									<td style="width:auto;"><?php
									$m = '';
									if($row['month']==1){
									$m='Jan';	
									}else if($row['month'] == 2){
										$m='Feb';
									}
									else if($row['month'] == 3){
										$m='March';
									}
									else if($row['month'] == 4){
										$m='April';
									}
									else if($row['month'] == 5){
										$m='May';
									}
									else if($row['month'] == 6){
										$m='June';
									}
									else if($row['month'] == 7){
										$m='July';
									}
									else if($row['month'] == 8){
										$m='Aug';
									}
									else if($row['month'] == 9){
										$m='Sep';
									}
									else if($row['month'] == 10){
										$m='Oct';
									}
									else if($row['month'] == 11){
										$m='Nov';
									}
									else if($row['month'] == 12){
										$m='Dec';
									}
									echo $m.' '.$row['date'].', '.$row['year'].' '.$row['time'];?></td>
									<td style="width:auto;"><p class="label label-success" style="font-size:13px;"><?php echo $row['res_status']?></p></td>
									<td>
									<center>
									<div class="btn-group">
									<button class="btn btn-danger btn-sm waves-effect waves-light" onclick="reservationCompleted(<?php echo $row['reservationid']?>,<?php echo $row['catererid']?>,'<?php echo $row['clientname']?>',<?php echo $row['month'] ?>,<?php echo $row['date']?>,'<?php echo $row['year']?>','<?php echo $row['time']?>','<?php echo $row['address']?>','<?php echo $row['email']?>','<?php echo $row['contact']?>','<?php echo $row['res_status']?>','<?php echo $row['message']?>','<?php echo $row['servicepackno']?>','<?php echo $row['food_packno']?>',<?php echo $row['price']?>,<?php echo $row['ocasion_id'];?>,'<?php echo $row['ocassion_name']?>',<?php echo $row['servicepackno']?>);" style="background-color:#821a1a;"><i class="fa fa-search"></i> View</button>
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