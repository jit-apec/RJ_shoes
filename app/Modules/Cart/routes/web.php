<?php
use App\modules\Cart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/product/cart',[CartController::class, 'create_cart']);
Route::get('/cart/delete',[CartController::class, 'remove_product']);
Route::get('/cart/edit',[CartController::class, 'update']);
