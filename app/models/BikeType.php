<?php

class BikeType extends \Eloquent {
  protected $fillable = [];
  protected $table = 'bike_types';

  public function users()
  {
    return $this->hasMany('User');
  }
}