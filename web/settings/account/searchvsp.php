 
 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
 <?php 
 include('includes/mysql.php');
 $getOid = intval($_GET['oid']);
 
 $query = mysql_query("SELECT tbl_ocasioncat.*, tbl_servicescovered.* FROM tbl_ocasioncat LEFT JOIN tbl_servicescovered ON tbl_ocasioncat.oid =  tbl_servicescovered.s_oid WHERE tbl_servicescovered.s_oid = '$getOid' GROUP by tbl_servicescovered.packageno") or die (mysql_error());
 if(mysql_num_rows($query)>0){
 while($row = mysql_fetch_array($query)){
	 $packno = $row['packageno'];?>
          <div class="panel panel-danger" >
            <div class="panel-heading" role="tab" id="heading<?php echo $row['serviceID']?>" style="background-color:#821a1a;">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['serviceID']?>" aria-expanded="true" aria-controls="collapse<?php echo $row['serviceID']?>">
                  <span style="color:#FFF;
				  "><?php echo $row['ocassion_name'].' @ &#8369;'.number_format($row['packageprice'],2,'.',',');?></span>
				  <span class="pull-right"><i class="fa fa-caret"></i></span>
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $row['serviceID'];?>" class="panel-collapse collapse <?php echo $row['serviceID'];?>" role="tabpanel" aria-labelledby="heading<?php echo $row['serviceID'];?>">
              <div class="panel-body">
			  <div class="row">
              <div class="col-md-6">
				<h4><i class="fa fa-cutlery"></i> SERVICE COVERED:</h4><hr style="border:dashed 1px #888888;">
				<ul ><?php include('includes/mysql.php');
					$sql = mysql_query("SELECT * FROM tbl_servicescovered WHERE s_oid = '$getOid' AND packageno  = '$packno'") or die (mysql_error());
					while($rows = mysql_fetch_array($sql)){?>
						<li style="list-style-type:none"><span class="fa fa-asterisk" style="color:green;"></span> <?php echo $rows['covered'];?></li>
						
					<?php }?></ul>
			  </div>
					<div class="col-md-6"><h4><i class="fa fa-cutlery"></i> FOOD OFFERED:</h4><hr style="border:dashed 1px #888888;">
					<ul>
					<?php include('includes/mysql.php');
					$sql = mysql_query("SELECT * FROM tbl_foodcovered WHERE s_foid = '$getOid' AND fpackageno  = '$packno'") or die (mysql_error());
					while($rows = mysql_fetch_array($sql)){?>
						<li style="list-style-type:none"><span class="fa fa-asterisk" style="color:green;"></span> <?php echo $rows['foodcovered'];?></li>
						
					<?php }?>
					</ul></div>
					
                   </div>
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">
					<span class="pull-right">
						<button class="btn btn-danger" onclick="deletePack(<?php echo $getOid?>,<?php echo $row['catererid']?>,<?php echo $row['packageno']?>);" style="background-color:#821a1a;"><span class="fa fa-trash"></span> Delete</button>
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
