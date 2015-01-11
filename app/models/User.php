<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Defines which fields can be manipulated in the database.
	 *
	 *	@var array
	 */
	protected $fillable = array(
							'surname',
							'firstname',
							'username',
							'email',
							'password'
						  );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 *	Upon adding a new user to the database, hash the password before storing it.
	 *
	 *	@var string
	 */
	public function setPasswordAttribute ($pass)
	{
		$this->attributes['password'] = Hash::make($pass);
	}
}
