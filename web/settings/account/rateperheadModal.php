<div class="modal fade bs-example-modal-lg" id="rphModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title"><i class="fa fa-gears"></i> Rate per head services</h4>
	</div>
	<div class="modal-body">
	<div class="col-md-6"><button class="btn btn-danger btn-xs" id="btnshowpph"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="show" ></i></button></div>
		<div class="col-md-6">
		<span class="pull-right"><button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hide?" id="btnhidepph"><i class="glyphicon glyphicon-eye-close"></i></button>
		</span>
		
		</div>
	<div id="pphcontent">
	<form onsubmit="return submitform_price()" name="priceform">
		<div class="row">
			<div class="col-md-6">
				<label>Price per head </label>
				<input type="number" class="form-control" placeholder="0.00" required name="pph"><br>
				
			</div>
			<div class="col-md-6">
				<label>No. of dish</label>
				<input type="number" data-toggle="tooltip" title="All kinds of foods included Ex. 10 kinds of dish dessert and etc. included" class="form-control" placeholder="0" required name="nod"><br>
				
			</div>
			</div>
			<div class="row">
			<div class="col-md-6">
				<label>People covered</label>
				<input type="number" class="form-control" placeholder="0" required name="pc"><br>
				<input type="hidden" class="form-control" required name="pcid">
				
			</div>
		
			<div class="col-md-6">

				<span class="pull-right" style="margin-top:10px;">
				<br>
					<button class="btn btn-danger" type="submit" name="save"id="btnsave"><i class="fa fa-check"></i> Save</button>
					<button class="btn btn-danger" type="submit" name="save"id="btnupdate"><i class="fa fa-check"></i> Update</button>
				</span>
			</div>
			
		</div>
		</form>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive" style="height:200px;">
					<table class="table table-striped table-condensed">
						<thead style="color:black;">
							<tr>
								<th style="color:black;">Price</th>
								<th style="color:black;">No. of dish</th>
								<th style="color:black;">People covered</th>
								<th style="color:black;"><center><i class="fa fa-gear"></i></center></th>
							</tr>
						</thead>
						<tbody id="pricelistbody" style="color:black;">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<hr style="border:dashed 1px #888888;">
		
		
		</div>
		<div class="col-md-6"><button class="btn btn-danger btn-xs" id="btnshowfo"><i class="glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Show" ></i></button></div>
		<div class="col-md-6">
		<span class="pull-right"><button class="btn btn-danger btn-xs" id="btnhidefo" type="button"><i class="glyphicon glyphicon-eye-close" data-toggle="tooltip" title="Hide?" ></i></button>
		</span>
		</div>
		<form  id="form_fo" enctype="multipart/form-data">
		<div id="focontent">
		<div class="row">
		
			<div class="col-md-12">
			
				<label>Food offered </label>
				<input type="text" class="form-control" id="foodordered" required name="fo">
				<span style="color:red; font-size:13px;" id="errormsg_fo"></span>
			</div>
		</div>
		<div class="row" style="margin-top:15px;">
		
			<div class="col-md-12">
				<label>Food Category</label>
				<input type="text" class="form-control" id="foodcategory" required name="fc" placeholder="Ex. Dessert etc.">
				<span style="color:red; font-size:13px;" id="errormsg_fc"></span>
			</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6">
				<label>Image</label>
				<input type="file" class="form-control" id="file" required name="file" accept="image/*" onchange="preview_image(event)">
				<span style="color:red; font-size:13px;" id="errormsg_file"></span>
			</div>
			<div class="col-md-6">
			<center>
				<img id="output_image" class="img-responsive img-thumbnail"/>
			</center>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-12">
				<span class="pull-right">
					<button class="btn btn-danger" type="submit"><i class="fa fa-check"></i> Save</button>
				</span>
			</div>
		</div>
		
		</form>
		<hr style="border:dashed 1px #888888;">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th style="color:black;">Food offered</th>
							<th style="color:black;">Category</th>
							<th style="color:black;"><center>Image</center></th>
							<th style="color:black;"><center><i class="fa fa-gear"></i></center></th>
						</tr>
					</thead>
					<tbody id="foodlistbody" style="color:black;">
					</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-white" data-dismiss="modal" style="box-shadow:1px 1px 1px 1px #888888;">Close</button>
	</div>
      
    </div>
  </div>
</div>
