<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

   public function showInfo(){
      $data = array();
      $data["title"] = "User info";
      return view("user_info", ["data" => $data]);
   }

   public function getUserPhysiqueData(Request $request){
      $data = array();
      $data["title"] = "My physique";
      $data["pysique_history"] = $this->getPhisiqueHistory(Auth::user()->id);
      return view("user_physique", ["data" => $data]);
   }

   private function getPhisiqueHistory($user_id){
      $data = array();
      
      return $data;
   }

   public function showTrainings(){

   }

   public function showWorkouts(){

   }
}
