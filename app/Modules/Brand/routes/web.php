<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

  Route::get('brand', 'BrandController@welcome');
  Route::get('/display',[BrandController::class,'display']);
  Route::get('addBrands',[BrandController::class,'addBrands']);
  Route::get('addbrand',[BrandController::class,'adddata']);
  Route::post('addbrand',[BrandController::class,'adddata']);
  Route::get('editbrand/{id}',[BrandController::class,'edit']);
  Route::post('editbrand/{id}',[BrandController::class,'update']);
  Route::get('trashbrand',[BrandController::class,'trashlist']);
  Route::get('movetrash',[BrandController::class,'movetrash']);
  Route::get('restorebrand',[BrandController::class,'restore']);
  Route::get('changebrandstatus',[BrandController::class,'changestatus']);
