<?php
use App\Modules\Frontend\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [FrontendController::class, 'frontend']);
Route::get('/grid', [FrontendController::class, 'grid']);
Route::get('/list', [FrontendController::class, 'list']);
Route::get('/user/{url}', [FrontendController::class, 'view']);
