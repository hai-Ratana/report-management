@extends('layouts.print')

@section('content')


        <div class="row">

           <div class="col-md-12">
             <div class="row">
               <div class="col-md-4">
                 <p>staff's name: &emsp; <strong> {{Auth::User()->firstname }} {{Auth::User()->lastname }} </strong> </p>
                 <p>staff's Email:&emsp; <strong>{{Auth::User()->email }}</strong> </p>
               </div>

             </div>
             <h2>Report List of Activity </h2>
             <br>

               <table class="table table-bordered table-striped ">
                  <thead>
                    <tr>

                      <th>Date</th>
                      <th>ProjectID</th>
                      <th>Project</th>
                      <th>Start</th>
                      <th>Stop</th>
                      <th>Break</th>
                      <th>Task</th>
                      <th>Plan</th>
                      <th>Note</th>
                      <th>impression</th>
                      <th>Total hours</th>
                      <th>Plus hours</th>

                    </tr>
                  </thead>
                  <tbody id="report-list">
                    @if(!empty($reports))
                      @foreach($reports as $key => $report)
                      <tr class="report{{ $report->id }}">

                        <td>{!! date_format($report->created_at,"d/m/Y") !!}</td>
                        <td>OOP{!! $report->projectId !!}</td>
                        <td>{!! $report->project !!}</td>
                        <td>{!! $report->startTime !!}</td>
                        <td>{!! $report->stopTime !!}</td>
                        <td>{!! $report->breakTime !!} min</td>
                        <td>{!! $report->task !!}</td>
                        <td>{!! $report->plan !!}</td>
                        <td>{!! $report->note !!}</td>
                         <td>{!! $report->impression !!}</td>
                         <td>{!! $report->totalTime!!} min</td>
                         <td>{!! $report->plustime!!} min</td>

                      </tr>
                      @endforeach
                       @endif
                  </tbody>
                </table>





           </div>
            </div><!--/.row-->




@endsection
