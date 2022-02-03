<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

  Route::get('brand', 'BrandController@welcome');
  Route::get('/brand/display',[BrandController::class,'display']);
  Route::get('/brand/addBrands',[BrandController::class,'addBrands']);
  Route::get('/brand/addbrand',[BrandController::class,'adddata']);
  Route::post('/brand/addbrand',[BrandController::class,'adddata']);
  Route::get('/brand/editbrand/{id}',[BrandController::class,'edit']);
  Route::post('/brand/editbrand/{id}',[BrandController::class,'update']);
  Route::get('/brand/trashbrand',[BrandController::class,'trashlist']);
  Route::get('/brand/movetrash',[BrandController::class,'movetrash']);
  Route::get('/brand/restorebrand',[BrandController::class,'restore']);
  Route::get('/brand/changebrandstatus',[BrandController::class,'changestatus']);
