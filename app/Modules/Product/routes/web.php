<?php
use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');
Route::get('product', 'ProductController@welcome');
Route::get('/admin/product/display',[ProductController::class,'display']);
Route::get('/admin/product/addproduct',[ProductController::class,'addproduct']);

Route::get('/admin/product/trash',[ProductController::class,'trashdisplay']);
