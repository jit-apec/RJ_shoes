<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');

Route::get('brand', 'BrandController@welcome');
Route::get('/admin/brand/display', [BrandController::class, 'display']);
Route::get('/admin/brand/addBrands', [BrandController::class, 'create']);
Route::get('/admin/brand/addbrand', [BrandController::class, 'add']);
Route::post('/admin/brand/addbrand', [BrandController::class, 'add']);
Route::get('/admin/brand/editbrand/{id}', [BrandController::class, 'edit']);
Route::post('/admin/brand/editbrand/{id}', [BrandController::class, 'update']);
Route::get('/admin/brand/movetrash', [BrandController::class, 'delete']);
Route::get('/admin/brand/trashbrand', [BrandController::class, 'trash']);
Route::get('/admin/brand/restorebrand', [BrandController::class, 'restore']);
Route::get('/admin/brand/changebrandstatus', [BrandController::class, 'changestatus']);
