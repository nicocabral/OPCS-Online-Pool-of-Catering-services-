<!-- Modal -->
<div class="modal fade" id="regModal<?php echo $row['cid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa  fa-exclamation-circle"></i> Registration Confirmation</h4>
      </div>
      <form>
      <div class="modal-body">
          <div class="row">
        	<div class="col-md-12">
            	<label>Registration Date:</label>
               <input type="date" name="date" id="regDate<?php echo $row['cid']?>"  class="form-control" required />
            </div>
        </div>
         <div class="row" style="margin-top:10px;">
         <p><em>Note: Use email as a Temporary Username</em></p>
        	<div class="col-md-12">
            	<label>Temporary Password</label>
               <input type="password" name="tempPword" id="tempPword<?php echo $row['cid']?>" onkeyup="checkAvailable(this.value,<?php echo $row['cid']?>);"class="form-control" required />
               <span id="result<?php echo $row['cid']?>"></span>
            </div>
   <input type="hidden"  id="email<?php echo $row['cid']?>" value="<?php echo $row['c_email']?>" class="form-control" required />
        
           
        </div>
        <div class="row" style="margin-top:10px;">
        <div class="col-md-3">
        <label>Password Length</label>
        <input type="number" class="form-control" value="7" style="text-align:center;" id="pwordLen<?php echo $row['cid']?>" required />
        </div>
        <div class="col-md-19">
        <label>Generate Password</label>
        <div class="input-group">
          <input type="text" name="genPword"  id="genPword<?php echo $row['cid']?>" class="form-control" required  autofocus/>
          <span class="input-group-btn">
         <button class="btn btn-success waves-effect waves-light" onclick="generatePword(<?php echo $row['cid']?>)">Generate</button>
         </span>
        </div>
  
            </div>
  
        
           
        </div>
      </div>
      <div class="modal-footer">
      	<span class="pull-left" id="logRes<?php echo $row['cid']?>"></span>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        <button onclick="submit(<?php echo $row['cid']?>)" class="btn btn-primary " >Register</button>
      </div>
      </form>
    </div>
  </div>
</div>