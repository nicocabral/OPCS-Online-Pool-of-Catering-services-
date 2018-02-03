<!-- Modal -->
<div class="modal fade" id="uandpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-gears"></i> Change username and password</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<label>Username</label>
				<input type="text" class="form-control" value="<?php echo $_SESSION['username'];?>" data-toggle="tooltip" title="Enter new username" id="uname"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Password</label>
				<input type="text" class="form-control" value="<?php echo $_SESSION['password'];?>" data-toggle="tooltip" title="Current password"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>New Password</label>
				<input type="password" class="form-control" value="<?php echo $_SESSION['password'];?>" data-toggle="tooltip" title="Enter new password" id="pword"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<span class="pull-right">
					<button class="btn btn-danger" id="btnupdatepword">Update </button>
				</span>
			</div>
		</div>
      </div>
      
    </div>
  </div>
</div>