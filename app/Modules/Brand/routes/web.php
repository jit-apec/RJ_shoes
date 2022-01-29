<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

 Route::get('brand', 'BrandController@welcome');
 // Route::get('br',[BrandController::class,'welcome']);
  Route::get('/display',[BrandController::class,'display']);

