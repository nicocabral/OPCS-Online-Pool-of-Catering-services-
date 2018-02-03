 
 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
 <?php 
 include('includes/mysql.php');
 $getOid = intval($_GET['id']);
 
 $query = mysql_query("SELECT tbl_ocasioncat.*, tbl_servicescovered.* FROM tbl_ocasioncat LEFT JOIN tbl_servicescovered ON tbl_ocasioncat.oid =  tbl_servicescovered.s_oid WHERE tbl_servicescovered.s_oid = '$getOid' GROUP by tbl_servicescovered.packageno") or die (mysql_error());
 if(mysql_num_rows($query)>0){
 while($row = mysql_fetch_array($query)){
	 $packno = $row['packageno'];?>
          <div class="panel panel-danger" >
            <div class="panel-heading" role="tab" id="heading<?php echo $row['serviceID']?>" style="background-color:#821a1a;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['serviceID']?>" aria-expanded="true" aria-controls="collapse<?php echo $row['serviceID']?>">
                  <span style="color:#FFF;
				  "><?php echo $row['ocassion_name'].' @ &#8369;'.$row['packageprice']?></span>
				  <span class="pull-right"><i class="fa fa-caret"></i></span>
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $row['serviceID'];?>" class="panel-collapse collapse <?php echo $row['serviceID'];?>" role="tabpanel" aria-labelledby="heading<?php echo $row['serviceID'];?>">
              <div class="panel-body">
               <table>
               		<tr>
					<th>SERVICE COVERED:</th>
					<th>FOOD OFFERED:</th></tr>
					
                    <tr><td><ul ><?php include('includes/mysql.php');
					$sql = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$getOid' AND packageno  = '$packno'") or die (mysql_error());
					while($rows = mysql_fetch_array($sql)){?>
						<li style="list-style-type:none"><span class="fa fa-asterisk" style="color:green;"></span> <?php echo $rows['covered'];?></li>
						
					<?php }?></ul></td>
					<td><ul>
					<?php include('includes/mysql.php');
					$sql = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$getOid' AND fpackageno  = '$packno'") or die (mysql_error());
					while($rows = mysql_fetch_array($sql)){?>
						<li style="list-style-type:none"><span class="fa fa-asterisk" style="color:green;"></span> <?php echo $rows['foodcovered'];?></li>
						
					<?php }?>
					</ul></td></tr>
                </table>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
					<span class="pull-right">
						<button class="btn btn-danger" onclick="reservePack(<?php echo $getOid?>,<?php echo $row['catererid']?>,<?php echo $row['packageno']?>);" style="background-color:#821a1a;"><span class="fa fa-check"></span> Reserve</button>
						</span>
					</div>
				</div>
			        </div>
            </div>
          </div>
         
          <?php }}else {
	 echo '<p class="alert alert-danger">No available services offered</p>';
 } ?> 
	</div>  
