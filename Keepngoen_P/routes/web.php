<?php

//used controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\objectiveCRUDcontroller;
use App\Http\Controllers\UpdateGOALcontroller;
use App\Http\Controllers\UpdateKeep;
use App\Models\Upkeep;
use App\Http\Controllers\UpdatePerday;

//create route for all controller and set name for used
Route::resource('objectivies', objectiveCRUDcontroller::class);
Route::resource('upgoal', UpdateGOALcontroller::class);
Route::resource('upkeep', UpdateKeep::class);
Route::resource('upperday', UpdatePerday::class);

//create route welcome home page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); //route for authentication

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

