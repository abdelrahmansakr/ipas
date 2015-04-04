<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model {

	function user()
	{
	  return $this->belongsToMany('App\User', 'story_user', 'story_id', 'user_id')->withTimestamps();
	}


	function slide()
	{
	  return $this->hasMany('App\Slide');
	}

}
