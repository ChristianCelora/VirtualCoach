<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Training;
use App\Exercise;
use App\TrainingExercise;
use App\WorkoutHistory;
use DateTime;
use Session;

class TrainingController extends Controller {

   public function showTrainings(){
     $data = array();
     $data["title"] = "Trainings";
     $data["workout"] = 0;

     try{
        $data["trainings"] = $this->getTrainingsData(Auth::user()->id);
     }catch(ModelNotFoundException $e){
        return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
     }

     return view("trainings", ["data" => $data]);
   }

   public function showWorkouts(){
      $data = array();
      $data["title"] = "Trainings";
      $data["workout"] = 1;

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

   public function addTraining(Request $request){
      // Create training
      $trainig = new Training;
      $trainig->name = $request->input("name");
      if(!$trainig->name || $trainig->name == ""){
         return back()->with("alert", array("status" => "error", "message" => "Name cannot be null"));
      }
      $trainig->trainer_id = 1; // Mock
      $trainig->client_id = Auth::user()->id;
      $now = new DateTime;
      $trainig->created_at = $now->format("Y-m-d H:i:s");
      try{
         $training_id = $trainig->save();
      }catch(QueryException $e){
         return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
      }
      // Mapping valid exercises to training
      $inserted = $this->addExercisesToTraining($training_id, $request->input("exercise"), $request->input("sets"),
         $request->input("reps"), $request->input("rest"));
      // If no exercises are valid delete training and return error
      if($inserted <= 0){
         Training::destroy($training_id);
         return back()->with("alert", array("status" => "error", "message" => "Training not added. Need at least 1 valid exercise"));
      }

      return back()->with("alert", array("status" => "ok", "message" => "Training added. Inserted $inserted exercises!"));
   }

   private function addExercisesToTraining(int $training_id, array $exercises, array $sets, array $reps, array $rest){
      $inserted = 0;

      for ($i=0; $i < sizeof($exercises); $i++) {
         // Check validity
         if($this->isExerciseValid($exercises[$i], $sets[$i], $reps[$i], $rest[$i])){
            $exercise = new TrainingExercise;

            $exercise->training_id = $training_id;
            $exercise->exercise_id = $exercises[$i];
            $exercise->order = $i + 1;
            $exercise->sets = $sets[$i];
            $exercise->reps = $reps[$i];
            $exercise->rest_between_sets = $rest[$i];
            try{
               $exercise->save();
               $inserted++;
            }catch(Exception $e){
               //
            }
            unset($exercise);
         }
      }

      return $inserted;
   }

   private function isExerciseValid($name, $set, $rep, $rest){
      return ($name != "" && is_numeric($set) && is_numeric($rep) && is_numeric($rest));
   }

   public function prepareWorkout(int $training_id, int $step = 0){
      $data = array();

      $training = Training::find($training_id);
      // $training = Training::where("id", $training_id)->where("order", $step)->get();
      $data["title"] = $training->name;
      $data["workout"] = $training_id;
      $data["step"] = $step;
      $data["exercise"] = $this->getWorkoutStep($training, $step);
      try{
         $active_workout = Session::get("active_workout");
         if($active_workout && isset($active_workout[0]) && $active_workout[0] != $training_id){
            return redirect()->route("training.resume", ["active_workout" => $active_workout[0]]);
         }
         $this->updateWorkout(Auth::user()->id, $training_id, $step);
      }catch(Exception $e){
         return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
      }

      return view("workout", ["data" => $data]);
   }

   private function getWorkoutStep(Training $training, int $step){
      $data = array();

      $i = 0;
      while($i < sizeof($training->exercises) &&
            $step >= $training->exercises[$i]->pivot->sets + 1){
         $step -= $training->exercises[$i]->pivot->sets;
         $i++;
      }

      if($i < sizeof($training->exercises)){
         $exercise = $training->exercises[$i];
         $data = array("step" => $exercise->pivot->order, "name" => $exercise->name,
            "reps" => $exercise->pivot->reps, "rest" => $exercise->pivot->rest_between_sets,
            "set_n" => $step, "total_set" => $exercise->pivot->sets
         );
         if( $exercise->pivot->trainer_notes != "" ){
            $data["trainer_notes"] = $exercise->pivot->trainer_notes;
         }
         if( $exercise->pivot->client_notes != "" ){
            $data["client_notes"] = $exercise->pivot->client_notes;
         }
         if($step == $exercise->pivot->sets){
            unset($data["rest"]);
         }
      }else{
         $data["last"] = true;
      }

      return $data;
   }

   private function updateWorkout(int $client_id, int $training_id, int $step){
      $res = WorkoutHistory::where("client_id", $client_id)
         ->where("training_id", $training_id)->whereNull("end")->get();
      if(!$res || sizeof($res) == 0){ // create one
         $workout = new WorkoutHistory;
         $workout->client_id = $client_id;
         $workout->training_id = $training_id;
         $workout->start = (new Datetime())->format("Y-m-d h:i:s");
         $workout->last_step = $step;

      }else if(sizeof($res) > 2){
         throw new \Exception("Error retriving active workout.", 1);
      }else{
         $workout = $res[0];
         $workout->last_step = $step;
      }

      $inserted_id = $workout->save();
      Session::put("active_workout", $inserted_id);
   }

   public function showResumeWorkout(int $active_workout){
      $data = array();
      $workout = WorkoutHistory::find($active_workout);
      if($workout){
         $data["workout"] = $active_workout;
         $data["step"] = $workout->last_step;
      }
      return view('workout_resume', ['data' => $data]);
   }

   public function cancelWorkout(int $training_id){
      // Will cancel all the history row if the workout is incomplete
      WorkoutHistory::destroy($training_id);
      Session::pull("active_workout");

      return view("home");
   }

   public function endWorkout(int $training_id){
      $workout = WorkoutHistory::find($training_id);
      if($workout){
         $workout->end = (new Datetime())->format("Y-m-d h:i:s");
         try{
            $workout->save();
            Session::pull("active_workout");
         }catch(Exception $e){
            return back()->with("alert", array("status" => "error", "message" => $e->getMessage()));
         }
      }

      return view("home");
   }
}
