<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/test', 'AbsenceEntryController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/dashboard/hr/update','departments\HRController@fetch');

Route::resource('users', 'UserController')->middleware("auth");
Route::middleware(['admin'])->group(function (){
    Route::get('dashboard', 'DashboardController@index')->middleware("auth");
    Route::resource('dashboard/hr', 'departments\HRController')->middleware("auth");
    Route::resource('dashboard/legal', 'departments\LegalController')->middleware("auth");
});
