<!-- Modal -->
<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Add Account</h4>
      </div>
      <form id="addAccountForm" class="form-horizontal">
      <div class="modal-body">
     
      <div class="row">
      	<div class="has-success col-lg-6">
        <label>Name:</label>
        <input type="text" name="aname" id="aname" class="form-control" required  />
        <span id="logMessage"></span>
        </div>
        <div class="has-success col-lg-6">
        <label>Email:</label>
        <input type="email" name="aemail" id="aemail" class="form-control" required />
        </div>
        </div>
         <div class="row" style="margin-top:15px;">
      	<div class="has-success col-lg-6">
        <label>Contact:</label>
        <input type="text" name="acon" id="acon" class="form-control" required />
        </div>
        <div class="has-success col-lg-6">
        <label>Type:</label>
        <select name="atype" class="form-control">
        <option>Select</option>
        <option></option>
        <option value="admin">Admin</option>
        </select>
        </div>
        </div>
        
        <div class="row" style="margin-top:10px;">
       
        <div class="has-success col-lg-4">
        	<select class="form-control" name="b-date" required data-toggle="tooltip" title="Date" >
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
            <div class="has-success col-lg-4">
            <select class="form-control" name="b-month" required data-toggle="tooltip" title="Month" >
  			 <option value="Jan">Jan</option>
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
        <div class="has-success col-lg-4">
     <input type="number" name="year" class="form-control" data-toggle="tooltip" title="Year" required  placeholder="<?php echo date('Y')?>"/> 

          </div>
        </div>
  	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal" style="border-radius:0;">Close</button>
       
        <button type="submit" class="btn btn-success waves-effect waves-light" name="saveAccount" style="border-radius:0;">Save</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!--------- add account password ------->
<!-- Modal -->
<div class="modal fade" id="addPwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> Username and Password</h4>
      </div>
      <form id="addPwordForm" class="form-horizontal">
      <div class="modal-body">
      <div class="row">
      	<div class="has-success col-lg-12">
        <label>Username:</label>
        <input type="text" name="username" id="username" class="form-control" required placeholder="Username"/>
        <span id="result"></span>
        </div>
        </div>
         <div class="row" style="margin-top:15px;">
        <div class="has-success col-lg-6">
        <label>Password:</label>
        <input type="password" name="pword" id="pword" class="form-control" required placeholder="********"/>
        </div>
        
      	<div class="has-success col-lg-6">
        <label>Confirm Password:</label>
        <input type="password" name="confirmpword" id="confirmpword" class="form-control" required  placeholder="********"/>
        </div>
        </div>
       
        
  	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal" style="border-radius:0;">Close</button>
        <button type="reset" class="btn btn-default waves-effect waves-light" style="border-radius:0;">Clear</button>
        <button type="submit" class="btn btn-success waves-effect waves-light" name="addPassword" style="border-radius:0;">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>