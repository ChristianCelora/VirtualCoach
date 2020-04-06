<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;

class ExerciseController extends Controller {

   public function showExercises(){
      $data["title"] = "Exercises";
      $data["exercises"] = $this->getExercises();
      return view("exercises")->with("data", $data);
   }

   private function getExercises(){
      $data = array();
      $res = Exercise::orderBy("name", "asc")->get();

      foreach ($res as $row){
         $data[] = array("id" => $row->id, "name" => $row->name);
      }

      return $data;
   }

   public function showFormExercise(){
      $data = array();
      $data["title"] = "Exercise - New";

      return view("new_exercise", ["data" => $data]);
   }

   public function addExercise(Request $request){
      $exercise = new Exercise;
      $exercise->name = $request->input("name");
      try{
         $exercise->save();
      }catch(QueryException $e){
         return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
      }
      return back()->with("alert", array("status" => "ok", "message" => "Exercise added!"));
   }

}
