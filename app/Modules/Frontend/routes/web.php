<?php
use App\Modules\Frontend\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'frontend']);
Route::get('/products', [FrontendController::class, 'product']);
Route::get('/user/{url}', [FrontendController::class, 'view']);
Route::get('/products/price',[FrontendController::class,'price_filter']);
