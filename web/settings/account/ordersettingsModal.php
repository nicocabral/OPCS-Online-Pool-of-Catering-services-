<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa  fa-cart-arrow-down"></i> Others available services</h4>
      </div>
      <div class="modal-body">
       <form enctype="multipart/form-data" id="saveorder">
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
		<div class="col-md-6"></div>
			<div class="col-md-6">
			<span class="pull-right">
			<button class="btn btn-danger" type="submit" name="btnsaveorder"><i class="fa fa-check"></i> Save</button>
			<button class="btn btn-danger" type="submit" name="btneditorder" id="btneditorder"><i class="fa fa-check"></i> Update</button>
			</span>
			</div>
		</div>
	   </form>
	   <br>
	   <div class="row">
	   <div class="col-md-12">
		<div class="table-responsive"style="height:300px;">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name/Description</th>
						<th>Price</th>
						<th><center><i class="fa fa-gear"></i></center></th>
					</tr>
				</thead>
				<tbody id="orderlistbody">
				
				</tbody>
			</table>
		</div>
	   </div>
	   </div>
      </div>
      
    </div>
  </div>
</div>