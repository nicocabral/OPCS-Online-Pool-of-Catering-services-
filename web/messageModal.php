<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-envelope"></i> New message</h4>
      </div>
	  <form id="msgForm">
      <div class="modal-body">
        <div id="logMessage"></div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">From:</label>
            <input type="text" class=" form-control" id="recipient-name" name="from" required data-toggle="tooltip" title="Caterer name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text" name="message-text" required></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Send message</button>
      </div>
	  </form>
    </div>
  </div>
</div>