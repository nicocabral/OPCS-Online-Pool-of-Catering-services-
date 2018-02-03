
<?php session_start();
if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else{
		include('includes/connection.php');
		$notifQuery = mysql_query("SELECT * FROM tbl_catererinfo WHERE c_status = 'New'") or die (mysql_error());
		if(mysql_num_rows($notifQuery)>0){
			while($rows = mysql_fetch_assoc($notifQuery)){
				
?>
                                       <!-- list item-->
                                       <a href="notification" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="fa  fa-user-plus noti-primary"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">A new Signed up Caterer</h5>
                                                <p class="m-0">
                                                    <small><?php echo $rows['c_name']?></small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                      <?php }
		}
		
		
	}?>
	<!-- message --->
    <?php if($_SESSION['type']!='admin'){
	header("location:../includes/logout_process");
	}else{
		include('includes/connection.php');
		$notifQuery = mysql_query("SELECT * FROM tbl_message WHERE m_status = 'New'") or die (mysql_error());
		if(mysql_num_rows($notifQuery)>0){
			while($rows = mysql_fetch_assoc($notifQuery)){
				
?>
                                       <!-- list item-->
                                       <a href="notification" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left p-r-10">
                                                <em class="md md-email noti-primary"></em>
                                             </div>
                                             <div class="media-body">
                                                <h5 class="media-heading">New message</h5>
                                                <p class="m-0">
                                                    <small>From: <?php echo $rows['m_from']?></small>
                                                </p>
                                             </div>
                                          </div>
                                       </a>

                                      <?php }
		}
		
		
	}?>