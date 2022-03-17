<?php
use App\modules\Cart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('cart', 'CartController@welcome');
Route::get('/product/cart',[CartController::class, 'create_cart']);
