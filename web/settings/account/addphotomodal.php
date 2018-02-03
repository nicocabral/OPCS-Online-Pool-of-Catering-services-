<!-- Modal -->
<div class="modal fade" id="addphotomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <a type="button" class="close" href="mwp"><span aria-hidden="true">&times;</span></a>
        <h4 class="modal-title" id="myModalLabel">Add photos</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
        <div class="col-md-12">
								
								<form action="process/uploadPic-process" class="dropzone" id="dropzone" enctype="multipart/form-data">
								
                              <div class="fallback">
                                <input name="file" type="file" multiple />
                              </div>

                            </form>
							</div></div>
      </div>
      <div class="modal-footer">
        <a href="mwp" type="button" class="btn btn-white">Close</a>
        
      </div>
    </div>
  </div>
</div>