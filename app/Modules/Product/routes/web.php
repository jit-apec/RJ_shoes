<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'/admin/product','middleware'=>['auth']], function()
{
Route::get('/addproduct', [ProductController::class, 'create']);
Route::post('/addproduct', [ProductController::class, 'insert']);
Route::get('/display', [ProductController::class, 'display']);
Route::get('/changestatus', [ProductController::class, 'changestatus']);
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/edit/{id}', [ProductController::class, 'update']);
Route::get('/trash', [ProductController::class, 'trash']);
Route::get('/move_trash', [ProductController::class, 'delete']);
Route::get('/restore', [ProductController::class, 'restore']);
Route::get('s/checkurl', [ProductController::class, 'checkurl']);
Route::get('/product_view/{url}', [ProductController::class, 'product_view']);
});