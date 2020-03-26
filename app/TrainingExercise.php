<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model {
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     'name', 'training_id', 'exercise_id', 'order', 'sets', 'rest_between_sets', 'trainer_notes', 'client_notes',
  ];

  public $timestamps = false;
}
