<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\WorkoutHistory;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

class LoginController extends Controller {
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

   use AuthenticatesUsers;

   /**
   * Where to redirect users after login.
   *
   * @var string
   */
   protected $redirectTo = RouteServiceProvider::HOME;

   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct(){
      $this->middleware("guest")->except("logout");
   }

   /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
   protected function authenticated(Request $request, $user){
      $this->getPendingWorkouts($request, $user->id);
      return redirect($this->redirectTo);
   }

   private function getPendingWorkouts($request, $id){
      $workout = WorkoutHistory::where("client_id", $id)->whereNull("end")->first();
      if($workout){
         Session::put("active_workout", $workout->id);
      }
   }
}
