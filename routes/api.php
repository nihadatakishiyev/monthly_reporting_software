<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list usersa
//Route::get('users', 'UserController@index');
//Route::get('user/{id}', 'UserController@show')->middleware("auth");
//Route::post('users', 'UserController@store');
//Route::post('users/{id}', 'UserController@store');
//Route::delete('users/{id}', 'UserController@destroy');

Route::resource('user', 'UserController');

