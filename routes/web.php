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
       // Route assigned name "user.workout"
       Route::get('workout', 'UserController@showWorkouts')->name('workout');
       // Route assigned name "user.clients"
       Route::get('clients', 'UserController@showClients')->name('clients');
   });

   Route::name('training.')->group(function () {
      // Route assigned name "training.get"
      Route::get('getTraining', 'TrainingController@showTrainings')->name('get');
      // Route assigned name "training.add"
      Route::get('addTraining', 'TrainingController@showFormTraining')->name('add');
      Route::post('addTraining', 'TrainingController@addTraining')->name('add');
   });

   Route::name('exercise.')->group(function () {
      // Route assigned name "training.get"
      Route::get('getExercise', 'ExerciseController@showExercises')->name('get');
      // Route assigned name "training.add"
      Route::get('addExercise', 'ExerciseController@showFormExercise')->name('add');
      Route::post('addExercise', 'ExerciseController@addExercise')->name('add');
   });
});
