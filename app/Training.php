<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'name', 'trainer_id', 'client_id', 'notes', 'created_at'
  ];

  public $timestamps = false;

  public function exercises(){
     return $this->belongsToMany('App\Exercise')
      ->withPivot('order', 'sets', 'reps', 'rest_between_sets', 'client_notes', 'trainer_notes');
  }

  public function training(){
        return $this->morphTo();
  }
}
