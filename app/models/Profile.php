<?php

class Profile extends \Eloquent {
  protected $fillable = [];
  protected $table = 'profiles';

  public function user()
  {
    return $this->belongsTo('User');
  }
}