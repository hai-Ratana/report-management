 <div class="row">
   <ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#week">Week</a></li>
    <li><a data-toggle="tab" href="#year">Year</a></li>
    

  </ul>

 </div> 
 
<div class="row">
  <div class="tab-content">
    <div id="week" class="tab-pane fade in active">
      @include('reportmg.partContent.week')

    </div>
    <div id="year" class="tab-pane fade">
      @include('reportmg.partContent.year')
    </div>
    
  </div>
</div>
  