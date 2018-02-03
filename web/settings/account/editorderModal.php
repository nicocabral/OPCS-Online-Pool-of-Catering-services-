<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa  fa-cart-arrow-down"></i> Others available services</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" id="editorderform">
		
		<div class="row">
			<div class="col-md-12">
				<label>Name/Desciption</label>
				<input type="text" class="form-control" name="name_des" id="name_des" required><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Price</label>
				<input type="number" class="form-control" name="name_price" id="name_price" required><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Image</label>
				<input type="file" class="form-control" name="file" id="file" required><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<label>Status</label>
				<select class="form-control" id="ordestat" name="orderstat">
				<option class="Available">Available</option>
				<option class="Un-Available">Un-Available</option>
				</select>
			</div>
		</div>
		<div class="row">
		<div class="col-md-6"></div>
			<div class="col-md-6">
			<span class="pull-right">
			<button class="btn btn-danger" type="submit"><i class="fa fa-check"></i> Save</button>
			</span>
			</div>
		</div>
	   </form>
      </div>
      
    </div>
  </div>
</div>