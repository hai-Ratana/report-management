<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectTable extends Model
{
     protected $table = 'wrm-tbl-projects'; 
	public $timestamps = false;
	protected $fillable = [
		 'id','nameProject', 'description','duration', 'other'
	];
}
