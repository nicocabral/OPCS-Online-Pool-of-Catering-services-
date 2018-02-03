<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $row['account_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa   fa-exclamation-circle"></i> Admin Information</h4>
      </div>
     
      <div class="modal-body">
     	<div class="row">
        	<div class="col-lg-12">
          	<div class="col-lg-2"></div>
            <div class="col-lg-8">
            
            	<dl class="dl-horizontal" style="font-size:16px;">
                <dt>Account :</dt> <dd><?php echo $row['account_name']?></dd>
                <dt>Email :</dt> <dd><?php echo $row['account_email']?></dd>
                <dt>Contact :</dt> <dd><?php echo $row['contact']?></dd>
                <dt>Username :</dt> <dd><?php echo $row['account_username']?></dd>
                <dt>Password :</dt> <dd><?php echo '********' ?></dd>
                </dl>
               
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal" style="border-radius:0;">Close</button>
        <button type="button" onclick="viewPassword(<?php echo $row['account_id']?>,'<?php echo $row['account_password']?>');"class="btn btn-success waves-effect waves-light" name="updatePassword" style="border-radius:0;"><i class="fa fa-search"></i> View Password</button> 
      </div>
     
    </div>
  </div>
</div>
<!--- account password --->
<!-- Modal -->
<div class="modal fade" id="passwordModal<?php echo $row['account_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cog"></i> Admin Password</h4>
      </div>
     
      <div class="modal-body">
     	<div class="row">
        	<div class="col-lg-12">
          	<div class="col-lg-2"></div>
            <div class="col-lg-8">
            	<h5 class="well">Password : <strong style="color:red; font-size:12px;"><?php echo $row['account_password'];?></strong></h5>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
         
      </div>
     
    </div>
  </div>
</div>



