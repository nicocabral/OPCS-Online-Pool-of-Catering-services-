<div class="modal fade bs-example-modal-sm" id="myActionModal<?php echo $row['cid']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="row">
       <center>
      <h3>Select Action</h3>
             <div class="btn-group" role="group" aria-label="...">
            
              <button type="button" class="btn btn-default waves-effect waves-light" <?php echo $disable;?> onclick="deactConfirm(<?php echo $row['cid']?>,'<?php echo $row['c_name']?>');"><i class="fa fa-ban"></i> Deact</button>
              <button type="button" class="btn btn-primary waves-effect waves-light" 
			  onclick="upRequest(<?php echo $row['cid']?>);"><i class="fa fa-refresh"></i> Update</button>
              <button type="button" class="btn btn-danger waves-effect waves-light" onclick="delRequest(<?php echo $row['cid'];?>,'<?php echo $row['c_regStat']?>');"><i class="fa fa-trash"></i> Delete</button>
            </div>
   </center>
	      </div>
    </div>
  </div>
</div>