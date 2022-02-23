<?php
use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');

Route::get('product', 'ProductController@welcome');
Route::get('/admin/product/display',[ProductController::class,'display']);
Route::get('/admin/product/changestatus',[ProductController::class,'changestatus']);
Route::get('/admin/product/addproduct',[ProductController::class,'dropdown']);
Route::post('/admin/product/addproduct',[ProductController::class,'insert']);
Route::get('/admin/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/admin/product/edit/{id}',[ProductController::class,'update']);
Route::get('/admin/product/trash',[ProductController::class,'trashdisplay']);
Route::get('/admin/product/move_trash',[ProductController::class,'movetotrash']);
Route::get('/admin/product/restore',[ProductController::class,'restore']);
Route::get('/admin/products/checkurl',[ProductController::class,'checkurl']);

Route::get('/admin/product/product_view/{url}',[ProductController::class,'product_view']);
