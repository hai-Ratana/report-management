<!DOCTYPE html>
<html lang="en">

<head>



    <title>Working Report System</title>
    <link rel="icon" type="image/x-icon" href="img/PPIT-logo.png">
    @include('parts.printData.style')

</head>

<body>

    <div class="container">
      @include('parts.printData.header')
      <br>
      <!-- Page Content -->
      <content>



              @yield('content')
              <hr>

                      <div class="row">

                          <div class="col-md-2  pull-right">
                              <p style="margin-left:-20px;">Date: &emsp;/ &emsp; &emsp;/</p>
                              <p style="margin-left:-20px;">Approved By:</p>

                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-5 " >
                          <button type="button" class=" col-md-4 btn btn-primary actionPrint" name="button">print</button>
                        </div>
                      </div>




          <!-- /.container -->
      </content>
      @include('parts.printData.footer')

    </div>










</body>
@include('parts.printData.script')

</html>
