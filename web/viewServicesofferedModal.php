<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="viewservicesOfferedModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color:#821a1a;"><span class="fa fa-gift"></span> Reservation per package</h4>
      </div>
      <div class="modal-body">
	  <div id="reservationOption" style="margin-bottom:10px;">
       <div class="row">
       	<div class="col-md-12">
	
        	<select class="form-control" onchange="showServices(this.value);">
              <option>Select package*</option> 
         <?php 
		 include('../includes/connection.php');
		  $getId= intval($_GET['id']);
		   $squery = mysql_query("SELECT * FROM tbl_ocasioncat WHERE mycid = '$getId'") or die (mysql_error());
				while($row = mysql_fetch_assoc($squery)){?>
            	<option value="<?php echo $row['oid']?>"><?php echo $row['ocassion_name'].' (Package)';?></option>
                <?php }?>
            </select>
                
        </div>
       </div>
	 </div>
        	<div id="showServices"></div>
	   </div>
      <div class="modal-footer">
		 
		<button type="button" class="btn btn-default" data-dismiss="modal" style="box-shadow:1px 1px 1px 1px #888888;">Close</button>
      
      </div>
    </div>
  </div>
</div>
