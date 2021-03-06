<?php
use App\Modules\Frontend\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [App\Http\Controllers\FrontendController::class, 'user'])->name('home');

Route::get('/', [FrontendController::class, 'frontend']);
Route::get('/products', [FrontendController::class, 'product']);
Route::get('/product/{url}', [FrontendController::class, 'view']);
Route::get('/products/filter',[FrontendController::class,'filter']);
Route::get('/products/addcart',[FrontendController::class,'addcart']);
Route::get('/myorder',[FrontendController::class,'display_orders']);
Route::get('/order/order_details/{id}',[FrontendController::class,'order_view']);

