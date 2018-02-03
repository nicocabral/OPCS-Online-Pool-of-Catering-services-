<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModalsignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-log-in"></i> Sign In</h4>
      </div>
	  <form class="form-horizontal">
      <div class="modal-body">
      
      <div id="signInres"></div>
	  
        <div class="row">
			<div class="has-success col-md-12">
				
				<input type="text" name="u-name" id="u-name" class="form-control" placeholder="Username" data-toggle="tooltip" title="Enter username">
			</div>
		</div>
		<div class="row">
			<div class="has-success col-md-12" style="margin-top:15px;">
				
				<input type="password" name="p-word" id="p-word" class="form-control "  placeholder="Password" data-toggle="tooltip" title="Enter password">
			</div>
		</div>
      </div>
      <div class="modal-footer">
	  <a class="btn btn-danger btn-rounded waves-effect waves-light pull-left" onclick="signinRequest();" style="box-shadow: 2px 2px 5px #888888;background-color:#821a1a;"> <i class="glyphicon glyphicon-log-in" ></i> Sign In</a>
	  <a href="javascript:void(0);"  onclick="signUp();" data-dismiss="modal"><i class="fa fa-edit"></i> Sign Up</a>
	   
       
      </div>
	  </form>
    </div>
  </div>
</div>