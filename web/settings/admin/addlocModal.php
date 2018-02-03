<!-- Modal -->
<div class="modal fade" id="addLocModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Add Location</h4>
      </div>
	  <form id="formaddLoc">
      <div class="modal-body">
        <div class="row">
			<div class="has-success col-md-6">
			
				<label>Select:</label>
			<select name="selectCity" class="form-control" required>
			<option></option>
			<?php include('includes/connection.php');
			$sql = mysql_query("SELECT * FROM tbl_city") or die (mysql_error());
			if(mysql_num_rows($sql)>0){
				while($row = mysql_fetch_assoc($sql)){?>
				<option value="<?php echo $row['cityid']?>"><?php echo $row['cityname']?></option>
				<?php }
			}?>
			</select>
			</div>
			<div class="has-success col-md-6">
			
				<label>Location Name:</label>
				<input type="text" name="locName" id="Locname" class="form-control" required placeholder="Location Name">
			</div>
			
		</i>
      </div>
	  </div>
      <div class="modal-footer">
	  <div id="logMsgTown" class="pull-left"></div>
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light" id="submit">Save</button>
      </div>
	  </form>
    </div>
  </div>
</div>