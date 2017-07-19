<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login working report</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/logoppit.png')}}">
    @include('parts.app.style')
    @include('parts.app.script')
    <style media="screen">
        body {
          background-image:url({{asset('img/background.jpg')}});

          background-size: auto;
        }
    </style>

</head>
<body>
    <div id="app" >
      @yield('content')
    </div>


</body>
</html>
