<!-- Modal -->
<div class="modal fade" id="myModalsignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Sign up for free!</h4>
      </div>
	  <form class="form-horizontal" id="signupForm">
      <div class="modal-body">
	  <div class="row" style="margin-top:5px;">
		<div class="col-md-12">
			<p style="color:#000;"><em>Fields with <span style="color:red;">*</span> are required</em></p>
		</div>
		</div>
        <div class="row">
			
			<div class="col-md-6">
			<div class="col-sm-1">
				<span style="color:red;">*</span>
				</div>
			<div class="col-sm-11">
				<span class="has-success">
				<input type="text" class="form-control" name="txt-Cname" id="txt-Cname" placeholder="Caterer name" required>
				</span>
				<span class="error_msg" id="errormsg_cname"></span>
			</div>
		</div>
			<div class="col-md-6">
			<div class="col-sm-1">
			<span style="color:red;">*</span>
			</div>
			<div class="col-sm-11">
			<span class="has-success">
				<input type="text" class="form-control" name="txt-Oname" id="txt-Oname" placeholder="Owner name" required>
			</span>
			<span class="error_msg" id="errormsg_oname"></span>
			</div>
			</div>
		</div>
		<div class="row" style="margin-top:10px;">
			<div class="col-md-6">
			<div class="col-sm-1">
			<span style="color:red;">*</span>
			</div>
			<div class="col-sm-11">
				<span class="has-success">
				<input type="email" data-toggle="tooltip" title="Please provide a valid Email" class="form-control" name="txt-email" id="txt-email" placeholder="Email" required>
				</span>
				<span class="error_msg" id="errormsg_email"></span>
				</div>
			</div>
            <div class="col-md-6">
			<div class="col-sm-1">
			<span style="color:red;">*</span></div>
			<div class="col-sm-11">
				<span class="has-success">
				<input type="text" data-toggle="tooltip" title="Please provide a valid contact" class="form-control" name="txt-con" id="txt-contact" placeholder="Contact" required></span>
				<span class="error_msg" id="errormsg_contact"></span>
			</div>
			</div>
	</div>
    <div class="row" style="margin-top:10px;">
			<div class="col-md-6" >
			<div class="col-sm-1">
			<span style="color:red;">*</span></div>
			<div class="col-sm-11">
				<span class="has-success">
				<textarea name="txt-address" id="txt-address" class="form-control" required placeholder="Location/Address"></textarea>
				</span>
				<span class="error_msg" id="errormsg_address"></span>
				</div>
			</div>
            <div class="col-md-6" style="margin-top:50px;">
				<div class="col-sm-1">
				<span style="color:red;">*</span></div>
				<div class="col-sm-11">
                <input id="checkbox-h" type="checkbox" name="txt-Checkbox" required> <em style="color:#000;">Before submitting I agreed to the <a href="javascript:void(0);" onclick="termsAndCondition();" data-toggle="tooltip" title="Click here">Terms</a> and <a href="javascript:void(0);" onclick="termsAndCondition();" data-toggle="tooltip" title="Click here">Conditions</a></em>
			</div>
			</div>
		</div>
		
      </div>
      <div class="modal-footer">
	  <a href="javascript:void(0);" class="pull-left" onclick="signIn();" data-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="Have an account already?"><i class="fa fa-sign-in"></i> Sign In</a>
      	<button class="btn btn-white btn-rounded waves-effect waves-light" type="reset" style="box-shadow: 1px 1px 1px 1px #888888;cursor:pointer;"> Clear</button>
        <button class="btn btn-danger btn-rounded waves-effect waves-light" id="submit" type="submit" name="submit" style="box-shadow: 1px 1px 1px 1px #888888;cursor:pointer;"><i class="fa fa-check-square-o"></i> Submit</button>
      </div>
	  </form>
    </div>
  </div>
</div>