<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

	function user()
	{
	  return $this->belongsToMany('App\User', 'quiz_user', 'quiz_id', 'user_id')->withTimestamps();
	}


	function question()
	{
	  return $this->belongsToMany('App\Question', 'question_quiz', 'quiz_id', 'question_id')->withTimestamps();
	}

}
