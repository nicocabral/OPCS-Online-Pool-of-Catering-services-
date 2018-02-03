<!-- Modal -->
<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Update Account</h4>
      </div>
      <form id="updateAccountForm" class="form-horizontal">
      <div class="modal-body">
      <div class="row">
      	<div class="has-success col-lg-6">
        <label>Name:</label>
        <input type="text" name="aname" id="aname" class="form-control" required value="<?php echo $_SESSION['name'];?>" />
        </div>
        <div class="has-success col-lg-6">
        <label>Email:</label>
        <input type="email" name="aemail" id="aemail" class="form-control" required value="<?php echo $_SESSION['email'];?>" />
        </div>
        </div>
         <div class="row" style="margin-top:15px;">
      	<div class="has-success col-lg-6">
        <label>Contact:</label>
        <input type="text" name="acon" id="acon" class="form-control" required value="<?php echo $_SESSION['contact'];?>" />
        </div>
        </div>
        
        <div class="row" style="margin-top:10px;">
        <div class="has-success col-lg-12">
        <div class="col-lg-4">
        	<select class="form-control" name="b-date" required data-toggle="tooltip" title="Birth Date">
            <option value="<?php echo $_SESSION['bdate']?>" selected="selected"><?php echo $_SESSION['bdate']?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            </select>
            </div>
            <div class="col-lg-4">
            <select class="form-control col-lg-3" name="b-month" required data-toggle="tooltip" title="Birth Month">
            <option value="<?php echo $_SESSION['bmonth']?>" selected="selected"><?php echo $_SESSION['bmonth']?></option>
            <option value="Feb">Feb</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
           
            </select>
        </div>
        <div class="col-lg-4">
            <select name="year" class="form-control" required data-toggle="tooltip" title="Birth Year"><?php ddY()?>
  
  </select>  
<?php

function ddY(){
        for($i=1970;$i<=date('Y');$i++)
        $arr[] = $i;
        $arr = array_reverse($arr);
        foreach($arr as $year){ 
         if($year == date('Y')) {
         echo '
		 <option value="'.$_SESSION['byear'].'">'.$_SESSION['byear'].'</option>
		 <option value="'.$year.'">'.$year.'</option>';

         } else {
            echo '<option value="'.$year.'">'.$year.'</option>
			';
        } 
    } 
    }

?>
          </div>
        </div>
      </div>
        
  	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="updateAccount">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>