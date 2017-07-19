<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Model\ProjectTable;
use App\Model\Report;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newTab()
    {
      $project = ProjectTable::all();

      return view('reportmg.tab1',['projects' => $project,'new' => 'active']);
    }
    public function viewTab(Request $request)
    {
        if(Auth::user()->role == 1){
          $report = Report::paginate(5,['*'],'page_a');
        }else {
          $report = Report::where('idUser',Auth::user()->id)->paginate(5,['*'],'page_a');
        }



      return view('reportmg.tab2',['reports' => $report]);
    }
    public function adminTab()
    {
      $project = ProjectTable::paginate(5,['*'],'page_c');
      $user = $users = User::paginate(5,['*'],'page_b');
      return view('reportmg.tab3',['projects'=> $project,'users' => $user,'admin' => 'active']);
    }

    public function viewFilter(Request $request)
    {

              $Date = explode('/',$request->get('month'));
              if(Auth::user()->role == 1){
                  $report = Report::whereYear('created_at',$Date[1])->whereMonth('created_at',$Date[0])->paginate(5,['*'],'page_a');
              }else{
                  $report = Report::where('idUser',Auth::user()->id)->whereYear('created_at',$Date[1])->whereMonth('created_at',$Date[0])->paginate(5,['*'],'page_a');
              }


              return view('reportmg.tab2',['reports' => $report]);


    }

      public function storeUser(Request $request){

         if($request->ajax()){
             if($request->has('email') && $request->has('password')){
                 $user = new User;
                 $user->firstname = $request->get('firstname');
                 $user->lastname = $request->get('lastname');
                 $user->user = $request->get('user');
                 $user->email = $request->get('email');
                 $user->role = $request->get('role');

                 $user->password = bcrypt($request->get('password'));
                 $user->save();
                 return response()->json(['status'=>'200',
                                     'users' => $user]);
             }
              return response()->json(['status'=>'400','data' => 'not found']);
             }
             return "faild";
         }
         public function editUser(Request $request ){
             if($request->ajax()){
                 $user = User::find($request->id);
                 if(!empty($user)){
                     $user->firstname = $request->get('firstname');
                     $user->lastname = $request->get('lastname');
                       $user->user = $request->get('user');
                     $user->email = $request->get('email');
                     $user->role = $request->get('role');
                     if(empty($request->get('password'))){
                     $user->save($request->except('password'));
                     }else{
                     $user->password = bcrypt($request->get('password'));
                     $user->save();

                     }

                     return response()->json(['status' => "200",'users' => $user]);

                 }
                 return response()->json(['status' => "400",'users' => 'data not found']);

             }
             return 'no connection';
         }
         public function removeUser(Request $request){
             if($request->ajax()){
                 $delete = User::find($request->get('id'));
                 if(!empty($delete)){
                   $delete->delete();
                   return response()->json(['status'=>'200']);
                 }
                 return response()->json(['status'=>'400']);
             }

             return "no connection";
         }


         public function storeProjects(Request $request){
              $newProject = new ProjectTable;
             if ($request->ajax()){
                 if($request->has('nameProject') && $request->has('duration')){

                     $newProject->nameProject = $request->get('nameProject');
                     $newProject->description = $request->get('description');
                     $newProject->duration = $request->get('duration');
                     $newProject->other = $request->get('other');

                     $newProject->save();
                     return response()->json(['status' => '200','datas' => $newProject]);
                 }
                 return response()->json(['status' => '400']);
             }
             return "lost connection";
         }
         public function editProject($id,Request $request){
             if($request->ajax()){
                 $edit = ProjectTable::find($id);
                 return response()->json(['project' => $edit]);
             }
             return "fail";

         }
         public function changeProject($id,Request $request){
             if($request->ajax()){
                 $updateProject = ProjectTable::find($id);
                 if(!empty($updateProject)){
                     $updateProject->nameProject = $request->get('nameProject');
                     $updateProject->description = $request->get('description');
                     $updateProject->duration = $request->get('duration');
                     $updateProject->other = $request->get('other');

                     $updateProject->save();

                     return response()->json(['status'=> 'updated','data'=> $updateProject]);
                 }
                      return response()->json(['status'=> '400','data'=> 'not found id']);
             }
             return "faild";
         }
         public function removeProject($id,Request $request){

             if($request->ajax()){
                 $project = ProjectTable::find($id)->delete();

                 return response()->json(['status' => 'deleted']);
             }
             return "faild";
         }

     public function createReport(){
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
             $notification = array(
             'message' => 'successed! your report has saved.',
             'alert-type' => 'success'
             );

             $newReport->save();
             return redirect('report')->with($notification);

         }
         return "faild";
     }
     public function filterReport(Request $request){
         if($request->ajax()){

         $report = Report::whereDate('created_at','=',$request->get('day'))->get();

             if(!empty($report)){
              return response()->json(['status'=>'200','datas' => $report]);
             }else{
              return response()->json(['status' => 'not found']);
             }

         }
         return "no connection";
     }
     public function editReport($id){
       $project = ProjectTable::all();

       $report = Report::find($id);
       if(!Empty($report)){
         return view('reportmg.tab1',['edit' => $report,'projects' => $project,'new' => 'active']);
       }
         return "no connection";
     }
     public function updateReport()
     {
       if(Input::has('id')){
         $update  = Report::find(Input::get('id'));
         $update->idUser = Input::get('idUser');
         $update->projectId = Input::get('projectId');
         $update->project = Input::get('project');
         $update->startTime = Input::get('startTime');
         $update->stopTime = Input::get('stopTime');
         $update->totalTime = Input::get('totalTime');
         $update->breakTime = Input::get('breakTime');
         $update->plustime = Report::plustime(Input::get('totalTime'));
         $update->task = Input::get('task');
         $update->plan = Input::get('action');
         $update->note = Input::get('knowledge');
         $update->impression = Input::get('impression');

         $update->update();
         return redirect('report');

       }
        return "Faild";
     }
     public function removeReport(Request $request){
       if($request->ajax()){
         $delete = Report::find($request->get('id'));
         if(!empty($delete)){
           $delete->delete();
           return response()->json(['status' => 'deleted']);
         }
         return response()->json(['status' => '200']);
       }
       return 'no connection';
     }
     public function printReport(){
       $report = Report::where('idUser', Auth::User()->id)->get();
       return view('reportmg.viewprint',['reports' => $report]);
     }

       public function testPage()
       {
         $reports = Report::paginate(2,['*'],'page_a');
         $project = ProjectTable::paginate(1,['*'],'page_b');
         return view('reportmg/test',['reports' =>$reports,'projects' => $project]);
       }
       public function ajaxReport(Request $request)
       {
         $reports = Report::paginate(2,['*'],'page_a');
         $project = ProjectTable::paginate(1,['*'],'page_c');
         $user = User::paginate(1,['*'],'page_b');
         if($request->ajax()){
          return view('/reportmg/content',['reports'=> $reports,'projects' => $project,'users' => $user])->render();
         }
       }
       public function test(){
         $data = Report::whereYear('created_at','06')->whereMonth('created_at','2017')->get();
         return $data;
       }

}
