<?php

class Message extends \Eloquent {
  protected $fillable = [];
  protected $table = 'messages';

  public function users()
  {
    return $this->belongsToMany('User');
  }
}