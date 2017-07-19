@extends('layouts.test')

@section('content')

<div class="table-responsive">
  <div class="reports list">
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
       <tbody >

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


                     <button class="btn btn-primary editReport" data-edit="{{ url('update/report') }}" data-url="{{ url('edit/report') }}" data-id="{{ $report->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                     <button class=" btn btn-danger modal-delete" data-id="{{ $report->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>









             </td>
              @endif
           </tr>
           @endforeach

       </tbody>
     </table>
     <div class=" myreport text-center">
    {!! $reports->links() !!}
      </div>
      <div class=" col-md-12 table-responsive list1">
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
        <div class="myproject text-center">
       {!! $projects->links() !!}
         </div>
      </div>

@endsection
