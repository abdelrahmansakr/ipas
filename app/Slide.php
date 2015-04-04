<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {

	// function user()
	// {
	//   return $this->belongsToMany('App\User', 'slide_user', 'slide_id', 'user_id');
	// }

	function user()
	{
	  return $this->belongsToMany('App\User')->withTimestamps();
	}


	function story()
	{
	  return $this->belongsTo('App\Story');
	}

}
