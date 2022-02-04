<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;


Route::get('colors', 'ColorsController@welcome');
Route::get('/admin/color/add',[ColorsController::class,'add']);
Route::get('/admin/color/addcolor',[ColorsController::class,'getdata']);
Route::post('/admin/color/addcolor',[ColorsController::class,'getdata']);

Route::get('/admin/color/displaycolor',[ColorsController::class,'displaycolor']);

Route::get('/admin/color/edit/{id}', [ColorsController::class, 'edit']);
Route::post('/admin/color/edit/{id}', [ColorsController::class, 'update']);

Route::get('/admin/color/changeStatus',[ColorsController::class,'changeStatus']);

// delete
Route::get('/admin/color/restore',[ColorsController::class,'restore']);

//trash
Route::get('/admin/color/trash',[ColorsController::class,'trashshow']);

//Route::get('displaycolor',[ColorsController::class,'displaydata']);
Route::get('/admin/color/movetotrash',[ColorsController::class,'movetotrash']);

Route::get('check_availability',[ColorsController::class,'check_availability']);
