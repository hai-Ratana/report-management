<br>
<form  id="report" data-toggle="validator" name="report" class="form-horizontal" @if(isset($edit)) action="{{ route('update')}}" @else action="{{ url('create/report')}}" @endif method="post"  role="form">
   {{ csrf_field() }}
             <input  type="hidden" class="form-control input-md" id="idUser" name="idUser" @if(isset($edit)) value="{{ $edit->idUser }}" @else value="{!! Auth::user()->id !!}" @endif >
             <input type="hidden" id="id"  name="id" @if(isset($edit)) value="{{ $edit->id }}" @endif class="form-control input-md dobule" >
    <div class="row">


          <div class="col-md-8">
              <!-- project ID -->
              <div class="form-group ">
                  <label class="col-md-1 control-label" for="selectbasic">project ID</label>
                    <div class="col-md-3">
                        <select  id="projectID" name="projectId" class=" selectItem form-control">

                          @if(isset($edit)) <option  value="{{ $edit->projectId }}" selected> 00P{{ $edit->projectId }}  </option>@endif
                          @foreach($projects as $key => $projectID)
                          <option   value="{!! $projectID->id !!}" id="selecteVal" data-index="{!! $key !!}">00P{!! $projectID->id !!}</option>
                          @endforeach
                        </select>
                    </div>
                    <label class="col-md-1 control-label" for="selectbasic">project</label>
                   <div class="col-md-3">

                        <select id="project" name="project" class="  form-control">
                          @if(isset($edit)) <option  value="{{ $edit->project }}" selected>{{ $edit->project }} </option>@endif

                          @foreach($projects as $key => $project)
                          <option  value="{!! $project->nameProject !!}"  >{!! $project->nameProject !!}</option>
                          @endforeach

                        </select>
                  </div>
                  <label class="col-md-1 control-label" for="textinput">Break Time</label>
                  <div class="col-md-3">
                     <input id="breakTime" pattern="^[0-9]{1,}$" data-error="not match format min" name="breakTime" @if(isset($edit)) value="{{ $edit->breakTime }}" @endif placeholder="mm" class="form-control input-md "  required="" type="text">
                     <div class="help-block with-errors"></div>
                  </div>
            </div>




              <!-- Start Time-->
              <div class="form-group">
                  <label class=" col-md-1 control-label " for="textinput">Start Time</label>
                  <div class="col-md-3">
                      <input id="startTime" name="startTime" pattern="^[0-9:0-9]{1,}$" data-error="not match format hh:mm" @if(isset($edit)) value="{{ $edit->startTime }}" @endif placeholder="hh:mm p" class="form-control date input-md " required="" type="text">
                      <div class="help-block with-errors"></div>
                  </div>
                   <label class="col-md-1 control-label" for="textinput">Stop Time</label>
                  <div class="col-md-3">
                      <input id="stopTime" name="stopTime" pattern="^[0-9:0-9]{1,}$" data-error="not match format hh:mm" @if(isset($edit)) value="{{ $edit->stopTime }}" @endif placeholder="hh:mn p" class="form-control date input-md "required="" type="text">
                      <div class="help-block with-errors"></div>
                  </div>
                  <label class="col-md-1 control-label" for="textinput">Total Time</label>
                  <div class="col-md-3">
                    <input id="totalTime" name="totalTime"  placeholder="Total Time"  @if(isset($edit)) value="{{ $edit->totalTime }}" @endif class=" form-control input-md " style="background-color:white;" required=""  type="text">
                  </div>

              </div>




            <!-- Task & Action -->
              <div class="form-group">
                  <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-4">
                          <label class="control-label " for="textarea">Task:</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <textarea class="form-control" id="task" rows="5"  name="task">@if(isset($edit)) {{ $edit->task }} @endif </textarea>
                        </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="control-label " for="textarea">Plan:</label>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-10 col-md-offset-2">
                      <textarea class="form-control" rows="5" id="action" name="action" >@if(isset($edit)) {{ $edit->plan }} @endif</textarea>
                      </div>
                    </div>
                  </div>
              </div>



            <!-- knowledge & Impression -->
              <div class="form-group">
                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="control-label " for="textarea">note:</label>
                      </div>


                    </div>
                    <div class="row">
                      <div class="col-md-10 col-md-offset-2">
                        <textarea class="form-control" rows="5" id="knowledge" name="knowledge">  @if(isset($edit)) {{ $edit->note }} @endif</textarea>
                      </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="control-label " for="textarea">Impression:</label>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-10 col-md-offset-2">
                        <textarea class="form-control" rows="5" id="impression" name="impression" >@if(isset($edit)) {{ $edit->impression }} @endif</textarea>
                      </div>
                    </div>
                </div>


            </div>
          </div>
          <!-- </col-lg-8> -->
          <div class="col-md-4">

                  <div class="panel panel-teal">
                    <div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
                    <div class="panel-body">
                      <div id="calendar"  data-link-field="toDay" data-link-format="yyyy-mm-dd"></div>
                    </div>
                  </div>
                  <input  id="toDay" type="hidden" value="" data-url="{{ url('report/day')}}" class="form-control input-md" >

          </div>
  </div>
<!-- </col-lg-4> -->

   <hr>
    <!-- Save &send Email -->
        <div class="col-md-12 ">
      <div class="form-group pull-right">

            <button id="save" name="save" type="submit" class="btn btn-success" ><span id="btn-title">Save</span></button>
            <button id="saveEmail" type="submit" name="saveEmail" data-url="{{url('sendmail')}}" class="btn btn-info sendMail">Save &amp; Send Email</button>
        </div>

      </div>








</form>
