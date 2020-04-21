<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
   Route::get('/home', 'HomeController@index')->name('home');
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('/test', function () {
       return view('welcome');
   });

   Route::name('user.')->group(function () {
      // Route assigned name "user.info"
       Route::get('info', 'UserController@showInfo')->name('info');

       // Route assigned name "user.physique"
       Route::get('physique', 'UserController@getUserPhysiqueData')->name('physique');
       Route::post('addPhysique', 'UserController@addUserPhysiqueData')->name('addPhysique');
<<<<<<< Updated upstream
=======
       // Route assigned name 'user.physique'
       Route::get('workoutLogs', 'UserController@getWorkoutLogs')->name('workoutLogs');
       // Route assigned name 'user.clients'
       Route::get('clients', 'UserController@showClients')->name('clients');
   });
>>>>>>> Stashed changes

       // Route assigned name "user.trainings"
       Route::get('trainings', 'UserController@showTrainings')->name('trainings');

       // Route assigned name "user.workout"
       Route::get('workout', 'UserController@showWorkouts')->name('workout');
   });
});
