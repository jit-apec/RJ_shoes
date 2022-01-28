<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;


Route::get('colors', 'ColorsController@welcome');
Route::get('add',[ColorsController::class,'add']);
Route::get('addcolor',[ColorsController::class,'getdata']);
Route::post('addcolor',[ColorsController::class,'getdata']);

Route::get('/displaycolor',[ColorsController::class,'displaycolor']);

Route::get('edit/{id}', [ColorsController::class, 'edit']);
Route::post('edit/{id}', [ColorsController::class, 'update']);

Route::get('/changeStatus',[ColorsController::class,'changeStatus']);

// delete
Route::get('restore',[ColorsController::class,'restore']);

//trash
Route::get('trash',[ColorsController::class,'trashshow']);

//Route::get('displaycolor',[ColorsController::class,'displaydata']);
Route::get('movetotrash',[ColorsController::class,'movetotrash']);

