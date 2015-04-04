<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	function user()
	{
	  return $this->belongsToMany('App\User')->withTimestamps();
	}


	function quiz()
	{
	  return $this->belongsToMany('App\Quiz', 'question_quiz', 'question_id', 'quiz_id')->withTimestamps();
	}


}
