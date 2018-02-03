<style>
.button {
  display: inline-block;
  padding: 5px 15px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>


                            <div id="accordion-modal<?php echo $row['oid']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content p-0">
                                        <div class="panel-group panel-group-joined" id="accordion-test">
                                        <?php 
										include('includes/connection.php');
										$getoid = intval($row['oid']);
										$packno = 0;
										$query = mysql_query("SELECT tbl_ocasioncat.*,tbl_servicescovered.*,tbl_foodcovered.* FROM tbl_ocasioncat 
										LEFT JOIN tbl_servicescovered ON tbl_ocasioncat.oid = tbl_servicescovered.s_oid 
										LEFT JOIN tbl_foodcovered ON tbl_ocasioncat.oid = tbl_foodcovered.s_foid WHERE 
										tbl_servicescovered.catererid = '".$row['mycid']."' AND s_oid = '$getoid' GROUP by tbl_servicescovered.packageno") or die (mysql_error());
										if(mysql_num_rows($query)>0){
										while($rows = mysql_fetch_assoc($query)){?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" >
                                                    <h4  style="font-family:'Comic Sans MS', cursive;font-variant:small-caps;color:#FFF;">
                                                        <a data-toggle="collapse" data-parent="#accordion-test<?php echo $rows['serviceID'] ?>" href="#collapse<?php echo $rows['serviceID']?>" class="collapsed">
                                                           <?php echo '<i class="fa fa-gift"></i> '.$rows['ocassion_name'].'&nbsp; <span class="fa fa-at"></span>  <span>&#8369;</span>'. number_format($rows['packageprice'],2,'.',',');
														   $packno = $rows['packageno'];?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse<?php echo $rows['serviceID']?>" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                        	<div class="col-md-6">
															<div class="panel panel-border panel-inverse" style="box-shadow:1px 1px 1px 1px #888888;">
															<div class="panel-heading">
                                                            	<h4  style="font-family:'Comic Sans MS', cursive;color:green;"><i class="fa fa-cutlery"></i> Service Covered</h4>
                                                            </div>
																<div class="panel-body">
															<ul>
                                                                <?php include('includes/connection.php');
																$servicequery = mysql_query("SELECT * FROM tbl_servicescovered WHERE catererid = '".$row['mycid']."' AND s_oid = '$getoid' and packageno = '".$rows['packageno']."'") or die (mysql_error());
																while($r = mysql_fetch_assoc($servicequery)){?>
                                                                	<li style="color:green;list-style-type:none"><?php echo '<i class="fa  fa-asterisk"></i> '.$r['covered']?></li>
                                                                    <?php }?>
                                                                </ul>
																</div>
																</div>
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="panel panel-border panel-inverse" style="box-shadow:1px 1px 1px 1px #888888;">
                                                            	<div class="panel-heading">
																<h4  style="font-family:'Comic Sans MS', cursive;color:green;"><i class="fa fa-shopping-basket"></i> Food Covered</h4>
                                                                </div>
																<div class="panel-body">
																<ul>
                                                                <?php include('includes/connection.php');
																$foodquery = mysql_query("SELECT * FROM tbl_foodcovered WHERE f_catid = '".$row['mycid']."'
																 AND s_foid = '$getoid' and fpackageno = '".$rows['packageno']."'") or die (mysql_error());
																while($fr = mysql_fetch_assoc($foodquery)){?>
                                                                	<li style="color:green;list-style-type:none"><?php echo '<i class="fa  fa-asterisk"></i> '.$fr['foodcovered']?></li>
                                                                    <?php }?>
                                                                </ul>
																</div>
																</div>
                                                            </div>
                                                  
                                                        </div>
														<div class="row" style="margin-top:5px;">
											<div class="col-md-6">
											</div>
											<!--- end of col md 6 --->
											<div class="col-md-6">
												<button class="button btn-block" onclick="reservationForm(<?php echo $row['oid']?>,<?php echo $row['mycid']?>,<?php echo $packno?>);">Reserve</button>
											</div>
											
														</div>
                                                    </div>
                                                </div>
                                            </div>
                                       <?php }}else {
										   echo '<p class="alert alert-danger"><strong>No available serviced offered</strong></p>';
										   }?>
                                        </div>
                                    </div><!-- /.modal-content -->
									
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->