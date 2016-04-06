<?php

class Profile extends \Eloquent {
  protected $fillable = [];
  protected $table = 'profiles';

  public function users()
  {
    return $this->hasMany('User');
  }
}