
 <script src="js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- jQuery -->
 <script src="js/bootstrap-datetimepicker.js"></script>
 <script src="js/bootstrap-datetimepicker1.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/lumino.glyphs.js"></script>
  <script src="{!! asset('/') !!}js/event.js"></script>
  <script src="js/ajaxEvent.js"></script>


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
    $('timedatepicker').on("dp.change", function(e){
        alert('Hey');
    });
    $('.actionPrint').on('click',function(){
      $(this).addClass('hidden');
      window.print();
    })
    window.onafterprint = function(){
      $('.actionPrint').removeClass('hidden');
    };


  </script>
