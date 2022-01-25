<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;


Route::get('colors', 'ColorsController@welcome');
Route::get('addcolor',[ColorsController::class,'getdata']);
Route::post('addcolor',[ColorsController::class,'getdata']);

Route::get('/displaycolor',[ColorsController::class,'displaycolor']);

Route::get('edit/{id}', [ColorsController::class, 'edit']);
Route::post('edit/{id}', [ColorsController::class, 'update']);

Route::get('changeStatus',[ColorController::class,'changeStatus']);
