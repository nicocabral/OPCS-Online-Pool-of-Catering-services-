<!-- Modal -->
<div class="modal fade" id="addCModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Add Caterer</h4>
      </div>
	  <form id="formAddClient">
      <div class="modal-body">
      <p><em>***Fill up*** </em></p>
        <div class="row">
			<div class="has-success col-md-6">
				<input type="text" name="comName" id="comName" class="form-control" required placeholder="Company name">
			</div>
            	<div class="has-success col-md-6">
				<input type="text" name="oName" id="oName" class="form-control" required placeholder="Owner name">
			</div>
	
      </div>
       <div class="row" style="margin-top:10px;">
			<div class="has-success col-md-6">
				<input type="email" name="email" id="email" class="form-control" required placeholder="Email">
			</div>
            	<div class="has-success col-md-6">
				<input type="text" name="contact" id="contact" class="form-control" required placeholder="Contact">
			</div>
	
      </div>
        <div class="row" style="margin-top:10px;">
			<div class="has-success col-md-12">
				<input type="text" name="address" id="address" class="form-control" required placeholder="Address">
			
	</div>
      </div>
	  </div>
      <div class="modal-footer">
	  <div id="logMsg" class="pull-left"></div>
        <button type="reset" class="btn btn-default waves-effect waves-light" style="border:radius:0;">Clear</button>
        <button type="submit"  class="btn btn-success waves-effect waves-light" id="submit" style="border-radius:0;">Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>