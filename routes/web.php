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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@showLoginForm']);
// Route::get('post', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@login']);
// Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);
//
// // Registration Routes...
// Route::get('register', ['as' => 'auth.register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
// Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\RegisterController@register']);
//
// // Password Reset Routes...
// Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
// Route::get('password/email', ['as' => 'auth.password.email',  'uses' => 'Auth\ResetPasswordController@sendResetLinkEmail']);
// Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {
    return view('welcome');
});
