<!-- Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cog"></i> Update Username and Password</h4>
      </div>
      <form id="updatePasswordForm" class="form-horizontal">
      <div class="modal-body">
      <div class="row">
      	<div class="has-success col-lg-12">
        <label>Username:</label>
        <input type="text" name="uname" id="uname" class="form-control" required placeholder="Username"/>
        <span id="result1"></span>
        </div>
        </div>
         <div class="row" style="margin-top:15px;">
        <div class="has-success col-lg-6">
        <label>Password:</label>
        <input type="password" name="pword" id="pword" class="form-control" required placeholder="********"/>
        </div>
        
      	<div class="has-success col-lg-6">
        <label>Confirm Password:</label>
        <input type="password" name="confirmpword" id="confirmpword" class="form-control" required  placeholder="********"/>
        </div>
        </div>
       
        
  	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="updatePassword">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>