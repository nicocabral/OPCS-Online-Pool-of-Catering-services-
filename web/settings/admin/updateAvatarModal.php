<!-- Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Update Avatar</h4>
      </div>
      <form enctype="multipart/form-data" action="" method="post">
      <div class="modal-body">
      <center>
      <img id="output_image" class="img-responsive img-thumbnail" src="../../assets/images/avatar/logo.png" width="200px;" alt="user-img"/><br />
        <input type="file" accept="image/*" onchange="preview_image(event)" name="image" style="margin-top:5px;" required>
        </center>
 		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="updateAvatar">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>