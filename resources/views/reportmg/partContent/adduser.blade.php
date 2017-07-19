<!-- Modal -->
  <div class="modal fade" id="userModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title " id="title-user">Create User</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal " id="frmUser"  data-toggle="validator">

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">First Name:</label>
          <div class="col-md-4">
          <input id="firstname" name="firstname" type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15"  placeholder="First Name" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group ">
          <label class="col-md-4 control-label" for="textinput">Last Name:</label>
          <div class="col-md-4">
          <input id="lastname" name="lastname" type="text" placeholder="last name" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control input-md" required="">

          </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">User name:</label>
          <div class="col-md-4">
          <input id="user" name="user" type="text" placeholder="User name" pattern="^[_A-z0-9]{1,}$" maxlength="15" class="form-control input-md" required="">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Email:</label>
          <div class="col-md-4">
            <input id="email" type="email" class="form-control" name="email"  data-error="this email address is invalid" placeholder="email" required autofocus>
            <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Role:</label>
          <div class="col-md-4">
            <select id="role" name="role" class="form-control">
              <option value="1">admin</option>
              <option value="2">user</option>
            </select>
          </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="passwordinput">Password: </label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">

          </div>
        </div>


        </form>
        <input type="hidden" id="userId" name="userId" value="">
         <div class="warningmsg-user ">
            Are you sure want to delete <strong id="msgid-user" style="color: red;"></strong> User ?
          </div>
        </div>
        <div class="modal-footer footer-users">

            <button class="btn btn-success action-user" data-url="{{ url('create/user/ajax') }}" data-edit="{{ url('edit/user/ajax') }}" data-delete="{{ url('delete/user/ajax') }}"><span id="footer-btnsubmit-user"></span></button>
            <button id="" name="button2id" class="btn btn-danger" data-dismiss="modal">reset</button>



        </div>
      </div>


    </div>
  </div>
