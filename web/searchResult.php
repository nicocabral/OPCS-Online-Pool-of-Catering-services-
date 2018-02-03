
<style>
.a_demo_four {
	background-color:#81c868;
	font-family: 'Comic Sans MS', cursive;
	font-size:14px;
	text-decoration:none;
	color:#fff;
	position:relative;
	padding:10px 20px;
	padding-right:50px;
	background-image: linear-gradient(bottom, #81c868 0%, rgb(62,184,229) 100%);
	background-image: -o-linear-gradient(bottom, #81c868 0%, rgb(62,184,229) 100%);
	background-image: -moz-linear-gradient(bottom, #81c868 0%, rgb(62,184,229) 100%);
	background-image: -webkit-linear-gradient(bottom, #81c868 0%, rgb(62,184,229) 100%);
	background-image: -ms-linear-gradient(bottom, #81c868 0%, rgb(62,184,229) 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0,#81c868),
	color-stop(1, #81c868)
	);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: inset 0px 1px 0px #81c868, 0px 5px 0px 0px #81c868, 0px 10px 5px #999;
	-moz-box-shadow: inset 0px 1px 0px #81c868, 0px 5px 0px 0px #81c868, 0px 10px 5px #999;
	-o-box-shadow: inset 0px 1px 0px #81c868, 0px 5px 0px 0px #81c868, 0px 10px 5px #999;
	box-shadow: inset 0px 1px 0px #81c868, 0px 5px 0px 0px #81c868, 0px 10px 5px #999;
}

.a_demo_four:active {
	top:3px;
	background-image: linear-gradient(bottom, #81c868 0%, rgb(44,160,202) 100%);
	background-image: -o-linear-gradient(bottom, #81c868 0%, rgb(44,160,202) 100%);
	background-image: -moz-linear-gradient(bottom, #81c868 0%, rgb(44,160,202) 100%);
	background-image: -webkit-linear-gradient(bottom, #81c868 0%, rgb(44,160,202) 100%);
	background-image: -ms-linear-gradient(bottom, #81c868 0%, rgb(44,160,202) 100%);
	background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0, #81c868),
	color-stop(1, #81c868)
	);
	-webkit-box-shadow: inset 0px 1px 0px #81c868, 0px 2px 0px 0px #81c868, 0px 5px 3px #999;
	-moz-box-shadow: inset 0px 1px 0px #81c868, 0px 2px 0px 0px #81c868, 0px 5px 3px #999;
	-o-box-shadow: inset 0px 1px 0px #81c868, 0px 2px 0px 0px #81c868, 0px 5px 3px #999;
	box-shadow: inset 0px 1px 0px #81c868, 0px 2px 0px 0px #81c868, 0px 5px 3px #999;
}

.a_demo_four::before {
	background-color:#81c868;
	background-image:url(assets/images/right_arrow.png);
	background-repeat:no-repeat;
	background-position:center center;
	content:"";
	width:20px;
	height:20px;
	position:absolute;
	right:15px;
	top:50%;
	margin-top:-9px;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-o-border-radius: 50%;
	border-radius: 50%;
	-webkit-box-shadow: inset 0px 1px 0px #81c868, 0px 1px 0px #81c868;
	-moz-box-shadow: inset 0px 1px 0px #81c868, 0px 1px 0px #81c868;
	-o-box-shadow: inset 0px 1px 0px #81c868, 0px 1px 0px #81c868;
	box-shadow: inset 0px 1px 0px #81c868, 0px 1px 0px #81c868;
}

.a_demo_four:active::before {
	top:50%;
	margin-top:-12px;
	-webkit-box-shadow: inset 0px 1px 0px #81c868, 0px 3px 0px #81c868, 0px 6px 3px #81c868;
	-moz-box-shadow: inset 0px 1px 0px #81c868, 0px 3px 0px #81c868, 0px 6px 3px #81c868;
	-o-box-shadow: inset 0px 1px 0px #81c868, 0px 3px 0px #81c868, 0px 6px 3px #81c868;
	box-shadow: inset 0px 1px 0px #81c868, 0px 3px 0px #81c868, 0px 6px 3px #81c868;
}
.a_demo_four:hover{
	color:#FFF;
}


</style> 
			
			<div class="row" style="margin-bottom:10px;">
		
       <?php 
	   	include('includes/connection.php');
		$count = 0;
			$filter = intval(trim($_GET['q']));
		$query = mysql_query("SELECT tbl_catererservices.*,tbl_catererinfo.*,tbl_catererregistration.*,tbl_ratings.* FROM tbl_catererservices LEFT JOIN tbl_catererinfo ON tbl_catererservices.myid = tbl_catererinfo.cid LEFT JOIN tbl_catererregistration ON tbl_catererservices.myid = tbl_catererregistration.c_cid LEFT JOIN tbl_ratings ON tbl_catererinfo.cid = tbl_ratings.rating_catererid WHERE tbl_catererservices.c_servicesLocid = '$filter' AND tbl_catererregistration.c_regStat = 'Available'") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			while($row = mysql_fetch_array($query)){
				?>
					 
									<a href="cateringsystem/index?id=<?php echo $row['cid'];?>+&title=<?php echo $row['c_name']?>+&header=<?php echo $row['c_avatar'];?>">
                                    <h4 style="color:#FFF;text-shadow:1px 1px 1px 1px #888888;font-variant:small-caps;">
                                    <i class="fa fa-cutlery"></i> <?php echo $row['c_name']?> <span style="color:#FFF;" class="fa fa-check"></span>
									</h4>
									 </a>
			<?php if($row['ratings'] <= 9 || $row['ratings'] ==0){
				$count = 0;
				echo '<p style="color:#FFF;"><span class="fa fa-thumbs-up" style="color:red;"></span> Ratings';
				for ($i=0;$i <=$count;$i++){
				echo ' <span class="fa fa-star-half-empty" style="color:#FFD700;"></span>';
				}
				echo '</p>';
			}else if ($row['ratings']<=20 && $row['ratings']>=10){
				$count = 0;
				echo '<p style="color:#FFF;">Ratings';
				for ($i=0; $i <= $count; $i++){
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span>';
				}
				echo '</p>';
			}
			else if ($row['ratings']<=40 && $row['ratings']>=21){
				$count = 1;
				echo '<p style="color:#FFF;"><span class="fa fa-thumbs-up" style="color:red;"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star-half-empty" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']<=60 && $row['ratings']>=41){
				$count = 1;
				echo '<p style="color:#FFF;"><span class="fa fa-thumbs-up" style="color:red;"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']<=80 && $row['ratings']>=61){
				$count = 2;
				echo '<p style="color:#FFF;"><span class="fa fa-thumbs-up" style="color:red;"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star-half-empty" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']<=95 && $row['ratings']>=81){
				$count = 2;
				echo '<p style="color:#FFF;"><span class="fa  fa-thumbs-up" style="color:#DAA520"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']<=110 && $row['ratings']>=96){
				$count = 3;
				echo '<p style="color:#FFF;"><span class="fa  fa-thumbs-up" style="color:#DAA520"></span>Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star-half-empty" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']<=125 && $row['ratings']>=111){
				$count = 4;
				echo '<p style="color:#FFF;"><span class="fa  fa-thumbs-up" style="color:#DAA520"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star-half-empty" style="color:#FFD700;"></span>';
				
				echo '</p>';
			}
			else if ($row['ratings']>=126){
				$count = 4;
				echo '<p style="color:#FFF;"><span class="fa  fa-thumbs-up" style="color:#DAA520"></span> Ratings';
				
				echo ' <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> <span class="fa fa-star" style="color:#FFD700;"></span> ';
				
				echo '</p>';
			}
			?>
				
		
									 
			<?php
			}
		
			}else {
				echo '<strong style="color:#FFF;">No record found</strong>';}
				
	   
	   ?>  
	   
				</div>
	
          <!-- Sweet-Alert  -->
       <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
       <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
		<script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="assets/pages/datatables.init.js"></script>
         <script type="text/javascript">
            $(document).ready(function () {
                
             
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
					scrollCollapse: true,
                    paging: true,
                    
                });
            });
            TableManageButtons.init();

        </script>
       