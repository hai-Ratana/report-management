<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $table = 'wrm-tbl-report';

	protected $fillable = [

		  'id','idUser','projectId','project','totalTime','startTime','stopTime',
		  'breakTime','plustime','plan', 'task','note','impression'
	];
  static function plusTime($total)
  {
    $OT =  $total - 480;
      return $OT;

  }
  static function intToTime($time)
  {
    $hour = $time/60;
    $min = $time%60;
    return $hour+':'+$min;
  }
}
