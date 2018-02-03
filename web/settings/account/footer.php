<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer id="footer" class="midnight-blue" style="background-color:#821a1a">
        <div class="container">
            <div class="row">
			<div class="col-sm-2"></div>
                <div class="col-sm-8 wow fadeInDown">
				<center>
                &copy; WTN 2016-<?php echo date('Y')?> <a target="_blank" href="#" title="#" class="wow fadeInDown"><span class="fa fa-cutlery"></span> <?php echo mysql_real_escape_string($sqlrow['c_name']);?></a>. All Rights Reserved.
                </center>
				</div>
               
            </div>
        </div>
    </footer><!--/#footer-->
	<script>
	function confirmlogout(id){
			swal({
  title: "Confirm logout",
  text: "Are you sure you want to logout?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Logout",
  closeOnConfirm: false
},
function(){
  window.location.href="process/logout_process?logout="+id;
});
		return false;
	}
	</script>