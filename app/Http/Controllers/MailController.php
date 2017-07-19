<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReportDaily;
use Mail;
use Illuminate\Support\Facades\Input;
use App\Model\Report;

class MailController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function sendMail(){
    $newReport = new Report;
    if(Input::has('idUser') && Input::has('startTime') && Input::has('stopTime') && Input::has('task')){

        $newReport->idUser = Input::get('idUser');
        $newReport->projectId = Input::get('projectId');
        $newReport->project = Input::get('project');
        $newReport->startTime = Input::get('startTime');
        $newReport->stopTime = Input::get('stopTime');
        $newReport->totalTime = Input::get('totalTime');
        $newReport->breakTime = Input::get('breakTime');
        $newReport->plustime = Report::plusTime((Input::get('totalTime')));
        $newReport->task = Input::get('task');
        $newReport->plan = Input::get('action');
        $newReport->note = Input::get('knowledge');
        $newReport->impression = Input::get('impression');
        if($newReport->save()){
          $content = [
              'title'=> 'Report management Daily',
              'body'=> 'you have done activity for today!',
              'projectId' => $newReport->projectId,
              'project' => $newReport->project ,
              'startTime' => $newReport->startTime ,
              'stopTime' => $newReport->stopTime ,
              'totalTime' => $newReport->totalTime ,
              'breakTime' => $newReport->breakTime ,
              'task' => $newReport->task ,
              'action' => $newReport->plan ,
              'knowledge' => $newReport->note ,
              'impression' => $newReport->impression,

              ];
          $notification = array(
          'message' => 'successed! your report has saved and sent mail.',
          'alert-type' => 'success'
          );

            $receiverAddress = Auth::user()->email ;
            Mail::to($receiverAddress)->send(new ReportDaily($content));



        }
        return redirect('report')->with($notification);
    }
    return "faild";

  }

}
