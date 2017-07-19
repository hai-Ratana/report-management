
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>

    <!-- jQuery -->
 <script src="{!! asset('/') !!}js/bootstrap-datetimepicker.js"></script>
 <script src="{!! asset('/') !!}js/bootstrap-datetimepicker1.min.js"></script>
  <script src="{!! asset('/') !!}js/bootstrap-datepicker.min.js"></script>
  <script src="{!! asset('/') !!}js/lumino.glyphs.js"></script>
  <script src="{!! asset('/') !!}js/ajaxEvent.js"></script>
  <script src="{!! asset('/') !!}js/validator.js"></script>







  <script type="text/javascript">
  	$('#calendar').timedatepicker({
      todayHighlight: 1,
       todayBtn:  1,
       startView: 2,
        minView: 2,
    });

    $('.MonthInput').datetimepicker({
        format:'mm/yyyy',
        autoclose: 1,
        startView:3 ,
         minView: 4,

        showMeridian: 1
    });
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif




  </script>
