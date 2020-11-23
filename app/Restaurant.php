<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {

	public function days()
	{
		return $this->belongsToMany('App\Day', 'workhours')->withPivot('start_time', 'end_time');
	}

}