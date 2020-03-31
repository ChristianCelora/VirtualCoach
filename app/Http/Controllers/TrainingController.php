<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Training;
use App\Exercise;

class TrainingController extends Controller {

   public function showTrainings(){
     $data = array();
     $data["title"] = "Trainings";

     try{
        $data["trainings"] = $this->getTrainingsData(Auth::user()->id);
     }catch(ModelNotFoundException $e){
        return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
     }

     return view("trainings", ["data" => $data]);
   }

   private function getTrainingsData(int $user_id){
     $data = array();

     $res = Training::where("client_id", "=", $user_id)->get();
     foreach ($res as $row){
        $data[$row->id] = array();
        $data[$row->id]["name"] = $row->name;
        $data[$row->id]["notes"] = $row->notes;
        $data[$row->id]["exercises"] = array();
        foreach ($row->exercises as $exercise){
           $data[$row->id]["exercises"][$exercise->pivot->order]["name"] = $exercise->name;
           $data[$row->id]["exercises"][$exercise->pivot->order]["sets"] = $exercise->pivot->sets;
           $data[$row->id]["exercises"][$exercise->pivot->order]["reps"] = $exercise->pivot->reps;
           $data[$row->id]["exercises"][$exercise->pivot->order]["rest"] = $exercise->pivot->rest_between_sets;
           $data[$row->id]["exercises"][$exercise->pivot->order]["c_notes"] = $exercise->pivot->client_notes;
           $data[$row->id]["exercises"][$exercise->pivot->order]["t_notes"] = $exercise->pivot->trainer_notes;
        }
     }

     return $data;
   }

   public function showFormTraining(){
      $data = array();
      $data["title"] = "Trainings - New";
      $data["exercises"] = $this->getExercises();

      return view("new_training", ["data" => $data]);
   }

   private function getExercises(){
      $data = array();

      $res = Exercise::all();
      foreach ($res as $row){
         $data[$row->id] = $row->name;
      }

      return $data;
   }
}
