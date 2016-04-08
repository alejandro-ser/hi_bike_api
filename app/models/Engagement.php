<?php

class Engagement extends \Eloquent {
  protected $fillable = [];
  protected $table = 'engagements';

  public function users()
  {
    return $this->belongsToMany('User');
  }
}