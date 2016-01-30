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

// ITEM DATABASE
Route::group(['prefix' => 'items'], function() {
    Route::group(['prefix' => 'armour'], function() {
        Route::get('/', 'ArmourController@index');
        Route::get('/{id}/{slug}', 'ArmourController@show')->where('id', '[0-9]+');
    });

    Route::get('/weapons', 'WeaponController@index');
});


// ARMOUR
Route::get('armour/search/{term}', 'ArmourController@search');
Route::resource('armour', 'ArmourController');
// WEAPONS
Route::get('weapon/search/{term}', 'WeaponController@search');
Route::resource('weapon', 'WeaponController');

// Monsters
Route::resource('monster', 'MonsterController');
Route::resource('spawn', 'SpawnController');
Route::get('spawn/drops/{id}', 'SpawnController@getDrops');
Route::get('spawn/search/{term}', 'SpawnController@search');

// Missions
Route::resource('mission', 'MissionController');
