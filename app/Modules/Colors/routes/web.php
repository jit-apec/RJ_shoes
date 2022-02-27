<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Colors\Http\Controllers\ColorsController;
use Illuminate\Support\Facades\Auth;

Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');

Route::get('colors', 'ColorsController@welcome');
Route::get('/admin/color/add', [ColorsController::class, 'create']);
Route::get('/admin/color/addcolor', [ColorsController::class, 'add']);
Route::post('/admin/color/addcolor', [ColorsController::class, 'add']);
Route::get('/admin/color/displaycolor', [ColorsController::class, 'display']);
Route::get('/admin/color/edit/{id}', [ColorsController::class, 'edit']);
Route::post('/admin/color/edit/{id}', [ColorsController::class, 'update']);
Route::get('/admin/color/changeStatus', [ColorsController::class, 'changeStatus']);
Route::get('/admin/color/uniquename', [ColorsController::class, 'checkurl']);
Route::get('/admin/color/restore', [ColorsController::class, 'restore']);
Route::get('/admin/color/trash', [ColorsController::class, 'trash']);
Route::get('/admin/color/movetotrash', [ColorsController::class, 'delete']);

