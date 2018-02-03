<table id="datatable-fixed-col" width="100%;" class="table table-striped table-bordered wow fadeInDown" style="cursor:pointer;" >
                                <thead style="color:#FFF;">
                                <tr class="wow fadeInDown bg-danger" style="background-color:#821a1a;" >
                                    <th style="width:auto;"><p style="color:#fff;" class="wow fadeInDown"><i class="fa fa-street-view"></i> Locations</p></th>
                                    
                                </tr>
                                </thead>
                               <tbody id="order_res" class="wow fadeInDown">
								<?php include('includes/mysql.php');
								$query = 'SELECT tbl_townloc.*,tbl_catererservices.* FROM tbl_townloc LEFT JOIN tbl_catererservices ON tbl_townloc.townid = tbl_catererservices.c_servicesLocid GROUP by townid';
								$res  = mysql_query($query) or die (mysql_error());
								$stat = '';
								if(mysql_num_rows($res)>0){
									while($row = mysql_fetch_assoc($res)){
										if($row['townid'] == $row['c_servicesLocid']){
											$stat = '<i class="fa fa-check" style="color:#228B22"></i>';
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
							<script>
									var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollCollapse: true,
                    paging: false,
                   
                });
		 TableManageButtons.init();
							</script>