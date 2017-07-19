<!DOCTYPE html>
<html lang="en">

<head>

    @include('parts.user.meta')

    <title>Working Report System</title>
    <link rel="icon" type="image/x-icon" href="img/logoppit.png">
    @include('parts.user.style')

</head>

<body>



    @include('parts.user.header')
    <br>
    <!-- Page Content -->


        <div class="container">
          <div class="row">
              <div class="col-md-12 ">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          New Working Report
                          <div class="col-md-4 pull-right">
                              <div class="dropdown pull-right">

                                  <a class="dropdown-toggle" data-toggle="dropdown" data-tooltip="tooltip" title="User Info!"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a><i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}</a></li>
                                    <li><a><i class="fa fa-suitcase" aria-hidden="true"></i> @if(Auth::user()->role == 1)
                                     Admin
                                     @else
                                     User
                                     @endif
                                     </a>
                                    </li>
                                    <li><a href="{{ route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
                                  </ul>
                                </div>
                          </div>

                      </div>
                      <div class="panel-body">

                          <ul class="nav nav-pills nav-tabs nav-justified">
                              <li @if(isset($new)) class="active" @endif><a  href="{{route('new')}}"><i class="fa fa-address-card-o" aria-hidden="true" ></i> New</a></li>
                              <li @if (isset($reports)) class="active" @endif ><a href="{{route('view')}}"><i class="fa fa-list-alt " aria-hidden="true"></i> View</a></li>
                               @if (Auth::user()->role == 1)
                              <li @if(isset($admin)) class="active" @endif><a href="{{route('admin')}}"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin</a></li>
                              @endif
                          </ul>

                          <div class="tab-content">

                                @yield('content')


                          </div>


                      </div>

                  </div>
              </div>
          </div>
        <!-- row -->




            @include('parts.user.footer')

        </div>
        <!-- /.container -->




 @include('parts.user.script')


</body>

</html>
