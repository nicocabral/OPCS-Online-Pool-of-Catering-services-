<!-- Modal -->
<div class="modal fade" id="editLocModal<?php echo $row['townid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Location</h4>
      </div>
	  <form id="formEditLoc">
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
				<label>Location Name:</label>
				<input type="text" name="locName" id="<?php echo $row['town']?>" value="<?php echo $row['town']?>" class="form-control" required>
			</div>
		</i>
      </div>
	  </div>
      <div class="modal-footer">
	  <div id="logMsgeTown" class="pull-left"></div>
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal" style="border-radius:0;">Close</button>
        <button type="button" onclick="editRequest('<?php echo $row['town']?>',<?php echo intval($row['tc_id'])?>,'<?php echo $row['townid']?>');" class="btn btn-success waves-effect waves-light" id="submit" style="border-radius:0;">Save Changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>