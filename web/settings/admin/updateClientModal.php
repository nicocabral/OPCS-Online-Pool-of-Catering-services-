<!-- Modal -->
<div class="modal fade" id="myModalUpdate<?php echo $row['cid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-refresh"></i> Update account</h4>
      </div>
     <form>
      <div class="modal-body">
       <div class="row">
       	<div class="col-lg-12">
        	<div class="input-group">
  	<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
  <input type="date" class="form-control" id="dateID<?php echo $row['cid'];?>" required aria-describedby="basic-addon1">
</div>

        </div>
       </div>
      </div>
      <div class="modal-footer">
      <div id="msg<?php echo $row['cid'];?>" class="pull-left"></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateSave(<?php echo $row['cid'];?>)">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>