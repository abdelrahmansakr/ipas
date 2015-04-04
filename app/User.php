<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	function parent()
	{
	  return $this->belongsToMany('App\User', 'child_parent', 'child_id', 'parent_id')->withTimestamps();
	}


	function child()
	{
	  return $this->belongsToMany('App\User', 'child_parent', 'parent_id', 'child_id')->withTimestamps();
	}


	function story()
	{
	  return $this->belongsToMany('App\Story', 'story_user', 'user_id', 'story_id')->withTimestamps();
	}

	function slide()
	{
	  return $this->belongsToMany('App\Slide', 'slide_user', 'user_id', 'slide_id')->withTimestamps()->withPivot('recordingURL');
	}

	// function slide()
 //    {
 //        return $this->hasManyThrough('App\Slide', 'App\Story', 'user_id', 'story_id');
 //    }

	// function slide()
 //    {
 //        return $this->story->belongsToMany('App\Slide');
 //    }


	function quiz()
	{
	  return $this->belongsToMany('App\Quiz', 'quiz_user', 'user_id', 'quiz_id')->withTimestamps();
	}

	function question()
	{
	  return $this->belongsToMany('App\Question', 'question_user', 'user_id', 'question_id')->withTimestamps()->withPivot('user_answer');
	}


	function trophy()
	{
	  return $this->belongsToMany('App\Trophy', 'trophy_user', 'user_id', 'trophy_id')->withTimestamps();
	}



}






