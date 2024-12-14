<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::resource('/estudiantes', App\Http\Controllers\estudianteController::class); 
Route::resource('/profesores', App\Http\Controllers\profesoresController::class);
Route::resource('/nominas', App\Http\Controllers\nominasController::class);
