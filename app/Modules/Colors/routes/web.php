<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\admin;

Route::group(['prefix' => '/admin/color','middleware' => ['auth']], function() {
Route::get('/add', [ColorsController::class, 'create']);
Route::get('/addcolor', [ColorsController::class, 'add']);
Route::post('/addcolor', [ColorsController::class, 'add']);
Route::get('/displaycolor', [ColorsController::class, 'display']);
Route::get('/changeStatus', [ColorsController::class, 'changeStatus']);
Route::get('/uniquename', [ColorsController::class, 'checkurl']);
Route::get('/restore', [ColorsController::class, 'restore']);
Route::get('/trash', [ColorsController::class, 'trash']);
Route::get('/movetotrash', [ColorsController::class, 'delete']);
Route::get('/edit/{id}', [ColorsController::class, 'edit']);
Route::post('/edit/{id}', [ColorsController::class, 'update']);
 });
