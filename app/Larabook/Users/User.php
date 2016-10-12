<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Larabook\Registration\Events\UserRegistered;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;


	protected $fillable = ['username','email','password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/*
	 * Passwords must always be hashed
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/*
	 * A user has many status
	 */

	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status');
	}
	/*
	 * Register a new user
	 */
	public static function register($username, $email, $password)
	{
		$user = new static(compact('username','email','password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}
}
