<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');

Route::get('brand', 'BrandController@welcome');
Route::get('/admin/brand/display', [BrandController::class, 'display']);
Route::get('/admin/brand/addBrands', [BrandController::class, 'addBrands']);
Route::get('/admin/brand/addbrand', [BrandController::class, 'adddata']);
Route::post('/admin/brand/addbrand', [BrandController::class, 'adddata']);
Route::get('/admin/brand/editbrand/{id}', [BrandController::class, 'edit']);
Route::post('/admin/brand/editbrand/{id}', [BrandController::class, 'update']);
Route::get('/admin/brand/trashbrand', [BrandController::class, 'trashlist']);
Route::get('/admin/brand/movetrash', [BrandController::class, 'movetrash']);
Route::get('/admin/brand/restorebrand', [BrandController::class, 'restore']);
Route::get('/admin/brand/changebrandstatus', [BrandController::class, 'changestatus']);
