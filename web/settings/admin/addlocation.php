<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Add Location</h4>
      </div>
	  <form id="addFormLocation">
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
			
				<label>City Name:</label>
				<input type="text" name="cityname" id="cityname" class="form-control" required placeholder="City Name">
			</div>
		</i>
      </div>
	  </div>
      <div class="modal-footer">
	  <div id="logMsg" class="pull-left"></div>
        <button type="button" onclick="showAddloc();" class="btn btn-default waves-effect waves-light">Add Location</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit">Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>