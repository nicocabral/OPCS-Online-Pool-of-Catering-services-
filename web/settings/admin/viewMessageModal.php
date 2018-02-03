<!-- Modal -->
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope"></i> Message Contents</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-4">
				<label>From:</label>
			</div>
			<div class="col-md-8">
				<p><?php echo $row['m_from'].' '.$row['m_date'];?></p>
			</div>
		</div>
		 <div class="row" style="margin-top:10px;">
			<div class="col-md-4">
				<label>Contents:</label>
			</div>
			<div class="col-md-8">
				<p><?php echo $row['m_content'];?></p>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>