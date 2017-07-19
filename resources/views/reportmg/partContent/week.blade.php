<div class="row">
   <div class="col-md-6 pull-right">
          <label class="col-md-2 col-md-offset-4 control-label " for="selectbasic">Month:</label>
          <form data-toggle="validator" action="{{ url('report/filter') }}" method="POST" role="form">
            {{ csrf_field() }}
          <div class="col-md-4 ">
              <input type="text" pattern="^[0-9/0-9]{1,}$" data-error="not match format Date" name="month" class="form-control MonthInput" required="">
              <div class="help-block with-errors"></div>
          </div>
          <div class="col-md-2 ">
            <button type="submit" class=" btn">
              <span ><i class="glyphicon glyphicon-th"></i></span>
            </button>
          </div>
          </form>

      </div>
</div>



 <div class="row">
  <div class="col-md-12">
    <h2>Report List of Activity for Week:</h2>
    <br>
   <div class="table-responsive">
     <div class="reports report-table">
       <table class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <th>ProjectID</th>
              <th>Project</th>
              <th>Start</th>
              <th>Stop</th>
              <th>Break</th>
              <th>Task</th>
              <th>Plan</th>
              <th>Total hours</th>
              <th>Plus Hours</th>
              @if(Auth::user()->role ==1)
              <th>other</th>
              @endif
            </tr>
          </thead>
          <tbody   class="list">

              @foreach($reports as $key => $report)
              <tr class="report{{ $report->id }}">
                <td>{!! ($key+1) !!}</td>
                <td>{!! date_format($report->created_at,"d/m/Y") !!}</td>
                <td>OOP{!! $report->projectId !!}</td>
                <td>{!! $report->project !!}</td>
                <td>{!! $report->startTime !!}</td>
                <td>{!! $report->stopTime !!}</td>
                <td>{!! $report->breakTime !!} min</td>
                <td>{!! $report->task !!}</td>
                <td>{!! $report->plan !!}</td>

                <td>{!! $report->totalTime!!} min</td>
                <td>{!! $report->plustime !!} min</td>
                 @if(Auth::user()->role ==1)
                <td>


                      <a href="{{url('edit/report')}}/{{ $report->id }}"> <button class="btn btn-primary " ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <button class=" btn btn-danger modal-delete" data-id="{{ $report->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>









                </td>
                 @endif
              </tr>
              @endforeach

          </tbody>
        </table>
        <div class="reports-pagination text-center">
       {!! $reports->links() !!}
         </div>

     </div>

   </div>


  </div>

 </div>

  <hr>
  <a href="{!! url('print')!!}" target="_blank"><button type="submit" class="btn btn-primary  col-md-offset-5 col-md-2">Print</button></a>
  <!-- Modal -->
    <div class="modal modal-danger fade" id="deleteReport" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="title-project">Delete Report</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" id="idReport" value="">
            <div class="warningmsg ">
              Are you sure want to delete Report ID :<strong id="msgid" style="color: red;"></strong>  ?
            </div>

        </div>
          <div class="modal-footer footer-project">

             <button id="" class="btn btn-success removeReport "  data-url="{{ url('remove/report') }}">Yes</button>
            <button id="button2id" name="button2id" class="btn btn-danger" data-dismiss="modal">No</button>

          </div>
        </div>


      </div>
    </div>
