<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model {
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name'
   ];

   public $timestamps = false;

   public function trainings(){
      return $this->belongsToMany('App\Training');
   }
}
