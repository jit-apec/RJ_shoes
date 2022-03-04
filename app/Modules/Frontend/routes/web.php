<?php
use App\Modules\Frontend\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'frontend']);
Route::get('/products', [FrontendController::class, 'product']);
Route::get('/grid', [FrontendController::class, 'grid']);
Route::get('/list', [FrontendController::class, 'list']);
Route::get('/user/{url}', [FrontendController::class, 'view']);
Route::post('/products/price',[FrontendController::class,'price_filter']);
