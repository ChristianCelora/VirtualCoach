<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Physique;

class UserController extends Controller {

   public function showInfo(){
      $data = array();
      $data["title"] = "User info";
      return view("user_info", ["data" => $data]);
   }

   public function getUserPhysiqueData(){
      $data = array();
      $data["title"] = "My physique";
      $data["pysique_history"] = $this->getPhisiqueHistory(Auth::user()->id);
      return view("user_physique", ["data" => $data]);
   }

   private function getPhisiqueHistory($user_id){
      $data = array();

      return $data;
   }

   public function addUserPhysiqueData(Request $request){
      if(!$this->isInputValid($request)){
         return back()->withErrors("Input not valid");
      }
      $user = new Physique;
      $user->client_id = Auth::user()->id;
      $user->weight = $request->weight;
      $user->height = $request->height;
      try{
         $user->save();
      }catch(Exception $e){
         return back()->withErrors($e->getMessage());
      }

      return back()->with(array("status" => "ok", "message" => "pysique added"));
   }

   private function isInputValid(Request $request){
      return (is_numeric($request->weight) && is_numeric($request->height));
   }

   public function showTrainings(){

   }

   public function showWorkouts(){

   }
}
