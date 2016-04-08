<?php

class BikeType extends \Eloquent {
  protected $fillable = [];
  protected $table = 'bike_types';

  public function user()
  {
    return $this->belongsTo('User');
  }
}