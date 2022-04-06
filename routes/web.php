<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Modules\Frontend\Http\Controllers\FrontendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_home')->middleware('auth');
Route::get('/', [FrontendController::class, 'frontend']);