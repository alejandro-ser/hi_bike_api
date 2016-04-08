<?php

class FriendsUser extends \Eloquent {
  protected $fillable = [];
  protected $table = 'friends_users';

  public function user()
  {
    return $this->belongsTo('User');
  }
}