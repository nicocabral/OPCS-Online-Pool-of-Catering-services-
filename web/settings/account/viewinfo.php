<!-- Modal -->
<div class="modal fade" id="viewinfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cutlery"></i> <?php echo $sqlrow['c_name']?> information</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<label>Catering name</label>
				<input type="text" class="form-control" name="c_name"  id="c_name" value="<?php echo $sqlrow['c_name'];?>"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Owner name</label>
				<input type="text" class="form-control" name="c_name"  id="oname" value="<?php echo $sqlrow['c_owner'];?>"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Contact</label>
				<input type="text" class="form-control" name="c_contact" id="c_contact" value="<?php echo $sqlrow['c_contact'];?>"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Email</label>
				<input type="text" class="form-control" name="c_contact" id="c_email" value="<?php echo $sqlrow['c_email'];?>"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Address/location</label>
				<input type="text" class="form-control" name="c_contact" id="c_address" value="<?php echo $sqlrow['c_address'];?>"><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<span class="pull-right">
				<button class="btn btn-danger" id="btnupateinfo">Update info</button>
			</span>
			</div>
		</div>
      </div>
      
    </div>
  </div>
</div>