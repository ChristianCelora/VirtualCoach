<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Physique;
use App\Training;
use Session;

class UserController extends Controller {

   public function showInfo(){
      $data = array();
      $data["title"] = "User info";
      return view("user_info", ["data" => $data]);
   }

   public function getUserPhysiqueData(){
      $data = array();
      $data["title"] = "My physique";

      try{
         $data["physique_history"] = $this->getPhisiqueHistory(Auth::user()->id);
      }catch(ModelNotFoundException $e){
         return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
      }

      return view("user_physique", ["data" => $data]);
   }

   private function getPhisiqueHistory(int $user_id){
      $data = array();

      $physiques = Physique::where("client_id", "=", $user_id)->get();
      foreach ($physiques as $p){
         $data[$p->created_at->format("d M Y - H:i:s")] = array("weight" => $p->weight, "height" => $p->height);
      }

      return $data;
   }

   public function addUserPhysiqueData(Request $request){
      if(!$this->isInputValid($request)){
         return back()->with("alert", array("status" => "error", "message" => "Input non valido"));
      }
      $user = new Physique;
      $user->client_id = Auth::user()->id;
      $user->weight = $request->weight;
      $user->height = $request->height;
      try{
         $user->save();
      }catch(Exception $e){
         return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
      }

      return back()->with("alert", array("status" => "ok", "message" => "Physique added"));
   }

   private function isInputValid(Request $request){
      return (is_numeric($request->weight) && is_numeric($request->height));
   }

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

   public function showWorkouts(){

   }
}
