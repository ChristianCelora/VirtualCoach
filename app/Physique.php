<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physique extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'client_id', 'weight', 'height'
  ];
}
