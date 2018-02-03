<div class="col-md-4">
				<h4 style="color:#000;"><strong><img src="../../assets/SETTINGS.ico" width="30px;"> Rate per package reservations</strong></h4>
			</div>
			<div class="col-md-6">
				<span class="pull-right wow fadeInDown" id="filterLabel"><i class="fa fa-filter" style="color:#228B22;margin-top:10px;"></i> Filter by:
				</span>
				</div>
				
				<div class="has-error col-sm-2">
				<select class="form-control wow fadeInDown" onchange="showfilterrpp(this.value);">
				<option value="new" >New</option>
				<option value="completed">Completed</option>
				<option value="pending">Pending</option>
				<option value="rejected">Rejected</option></select>
			
				</div>	
				<br>
			<div class="has-error col-md-12">
				<div class="wow fadeInDown table-responsive" style="margin-top:10px;" id="reservationListing">
				
					
				</div>
				</div>