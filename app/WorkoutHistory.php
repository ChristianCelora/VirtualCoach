<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkoutHistory extends Model {

   protected $table = "workout_history";

   public $timestamps = false;

   protected $fillable = [
      'id', 'client_id', 'training_id', 'start', 'end', 'last_step'
   ];

   public function training(){
        return $this->morphOne('App\Training', 'training');
   }
}
