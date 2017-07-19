<!-- Modal -->
  <div class="modal modal-danger fade" id="projecForm" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title-project">Create Project</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal " id="frmProject" data-toggle="validator" >
             {{ csrf_field() }}
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Project:</label>
                  <div class="col-md-8">
                  <input id="nameProject" name="nameProject" pattern="^[_A-z 0-9]{1,}$" maxlength="50" type="text" placeholder="input project name" class="form-control input-md" required="">

                  </div>
                </div>

               <!-- Textarea -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textarea">Description:</label>
                  <div class="col-md-8">
                    <textarea class="form-control" id="description" pattern="^[_A-z 0-9]{1,}$" maxlength="50" name="description"></textarea>
                  </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textinput">Duration:</label>
                  <div class="col-md-8">
                  <input id="duration" name="duration" type="text" pattern="^[_A-z 0-9]{1,}$" maxlength="10" placeholder="input Duration" class="form-control input-md" required="">

                  </div>
                </div>


               <!-- Textarea -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="textarea">Other Info:</label>
                  <div class="col-md-8">
                    <textarea class="form-control" id="other" pattern="^[_A-z 0-9]{1,}$" maxlength="50" name="other"></textarea>
                  </div>
                </div>
                <input type="hidden" id="idProject" name="id" value="">

          </form>
          <div class="warningmsg ">
            Are you sure want to delete <strong class="msgName" style="color: red;"></strong> Project ?
          </div>

      </div>
        <div class="modal-footer footer-project">

           <button id="" class="btn btn-success action" data-add="{{ url('create/project/ajax') }}" data-url="{{ url('project/delete/ajax') }}" data-edit-url="{{ url('edit/project/ajax')}}"><span id="footer-btnsubmit"></span></button>
          <button id="button2id" name="button2id" class="btn btn-danger" data-dismiss="modal">reset</button>

        </div>
      </div>


    </div>
  </div>
