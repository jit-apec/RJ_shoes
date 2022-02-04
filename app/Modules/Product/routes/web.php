<?php
use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('product', 'ProductController@welcome');
Route::get('/admin/product/display',[ProductController::class,'display']);
