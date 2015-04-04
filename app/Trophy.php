<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model {

	function user()
	{
	  return $this->belongsToMany('App\User', 'trophy_user', 'trophy_id', 'user_id')->withTimestamps();
	}

}
