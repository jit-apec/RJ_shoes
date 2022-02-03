<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;


Route::get('colors', 'ColorsController@welcome');
Route::get('/color/add',[ColorsController::class,'add']);
Route::get('/color/addcolor',[ColorsController::class,'getdata']);
Route::post('/color/addcolor',[ColorsController::class,'getdata']);

Route::get('/color/displaycolor',[ColorsController::class,'displaycolor']);

Route::get('/color/edit/{id}', [ColorsController::class, 'edit']);
Route::post('/color/edit/{id}', [ColorsController::class, 'update']);

Route::get('/color/changeStatus',[ColorsController::class,'changeStatus']);

// delete
Route::get('/color/restore',[ColorsController::class,'restore']);

//trash
Route::get('/color/trash',[ColorsController::class,'trashshow']);

//Route::get('displaycolor',[ColorsController::class,'displaydata']);
Route::get('/color/movetotrash',[ColorsController::class,'movetotrash']);

Route::get('check_availability',[ColorsController::class,'check_availability']);
