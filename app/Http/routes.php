<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
    User related functions
*/


// Authentication routes...

// Login
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

// Logout
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// User dashboard
Route::get('dashboard', 'UserController@dashboard');

// Character - RESTful
Route::resource('character', 'CharacterController');

// Job - RESTful
Route::resource('job', 'JobController');

// Race - RESTful
Route::resource('race', 'RaceController');

// Item related routes - all RESTful
Route::resource('itemquality', 'ItemQualityController');
