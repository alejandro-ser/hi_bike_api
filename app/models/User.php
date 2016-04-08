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

	public $timestamps = false;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

  public function bikeType()
  {
    return $this->hasOne('BikeType');
  }

  public function profile()
  {
    return $this->hasOne('Profile');
  }

  public function friends()
  {
    return $this->hasMany('Friend');
  }

  public function engagements()
  {
    return $this->belongsToMany('Engagement', 'engagements_users');
  }

  public function messages()
  {
    return $this->belongsToMany('Messages', 'messages_users');
  }

}
