<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutHistory extends Model {
   
   protected $table = "workout_history";
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   protected $fillable = [
      'id', 'client_id', 'training_id', 'start', 'end', 'last_step'
   ];
}
