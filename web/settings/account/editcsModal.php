<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Update catering services packages</h4>
      </div>
      <div class="modal-body">
        <div class="row" >
			<div class="col-sm-12">
			<form name="editpackform" onsubmit="return editpackage()">
				<label>Catering service name</label>
				<input type="text" class="form-control" name="packname" id="editpn" placeholder="Ex. Birthday services" required>
				<span style="color:red;font-size:13px;" id="errormsg_pn"></span>
				<input type="hidden" class="form-control" name="poid" id="editpoid">
				<label style="margin-top:10px;">catering service description</label>
				<textarea class="form-control" placeholder="Ex. Celebrate your debut with our birthday packages" name="editdes" required id="editdes"></textarea>
				<span style="color:red;font-size:13px;" id="errormsgdes"></span>
				<label style="margin-top:10px;" >Catering services Status</label>
				<select class="form-control" name="status"required id="editstat">
					<option value="Available">Available</option>
					<option value="Un-available">Un-Available</option>
				</select>
				<br>
				<span class="pull-right" style="margin-bottom:10px;">
				<button class="btn btn-danger" type="submit"><strong><i class="fa fa-check"></i> Update catering service</strong></button>
				</span>
				<br>
				</form>
			</div>
			</div>
			
		
      </div>
   
    </div>
  </div>
</div>