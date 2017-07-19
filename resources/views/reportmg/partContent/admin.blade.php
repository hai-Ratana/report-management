<div class="row">
   <ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#createUser">user</a></li>
    <li><a data-toggle="tab" href="#createProject">project</a></li>


  </ul>

 </div>

<div class="row">
  <div class="tab-content">
    <div id="createUser" class="tab-pane fade in active ">
    <br>
    <h2>User list:</h2>
      <div class="col-md-4 pull-right">
        <button class=" pull-right btn btn-info" data-toggle="modal" data-target="#userModal" id="users"><i class="fa fa-plus-circle" aria-hidden="true"></i> User</button>


      </div>

    @include('reportmg.partContent.adduser')
    <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped">
        <thead>
          <tr>

            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Password</th>
            <th>other</th>
          </tr>
        </thead>

        <tbody id="user-list" >

           @if(!empty($users))
            @foreach($users as $key => $user)
             <tr class="user{{ $user->id }}">
              <td>{!! $user->firstname !!}</td>
              <td>{!! $user->lastname !!}</td>
              <td>{!! $user->user !!}</td>
              <td>{!! $user->email !!}</td>
              <td>
              @if($user->role ==1)
                  admin
                @else
                  User
              @endif
              </td>
               <td>......</td>
              <td>

                <button class="btn btn-primary edit-user" data-userid="{{ $user->id }}" data-fn="{{ $user->firstname }}" data-ln="{{ $user->lastname }}" data-email="{{ $user->email }}" data-role="{{ $user->role }}" data-user="{{ $user->user }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                <button class="btn btn-danger remove-user" data-userid="{{ $user->id }}" data-fn="{{ $user->firstname }}" data-ln="{{ $user->lastname }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
              </td>
            </tr>
            @endforeach

          @endif


        </tbody>
      </table>

        <div class=" user-pagination text-center">
          {!! $users->links() !!}
       </div>
    </div>



    </div>
    <div id="createProject" class="tab-pane fade">
       <br>
    <h2>User list:</h2>
      <div class="col-md-4 pull-right">
        <button id="projectModal" class=" pull-right btn btn-info" data-toggle="modal" data-target="#projecForm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Project</button>

      </div>
      @include('reportmg.partContent.addproject')
    <div class=" col-md-12 table-responsive">
      <table id="table-project" class="table table-bordered table-striped">
        <thead>
          <tr >
            <th>Project ID</th>
            <th>Project</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Other</th>
            <th>Act</th>
          </tr>
        </thead>
        <tbody id="project-list" class="tbody-project">

          @if(!empty($projects))
          @foreach($projects as $key => $pro)
          <tr class="project{{ $pro->id }}" >
            <td>00P{!! $pro->id !!}</td>
            <td>{!! $pro->nameProject !!}</td>
            <td>{!! $pro->description !!}</td>
            <td>{!! $pro->duration !!}</td>
            <td>{!! $pro->other !!}</td>
            <td>

              <button class="btn btn-primary edit "
              data-id="{{ $pro->id }}"

              data-name="{{ $pro->nameProject}}"
              data-desc="{{ $pro->description}}"
              data-duration="{{ $pro->duration}}"
              data-other="{{ $pro->other }}"
              ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
              <button class="btn btn-danger removeProject" data-name="{{ $pro->nameProject}}"
              data-id="{{ $pro->id }}" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      <div class="reports-pagination text-center">
     {!! $projects->links() !!}
       </div>
    </div>

    </div>


  </div>
</div>
