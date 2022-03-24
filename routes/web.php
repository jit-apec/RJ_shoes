<?php

use Illuminate\Support\Facades\Route;


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

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });
// Route::group(['middleware' => ['auth', 'user'], 'prefix' => '/user'], function () {
//    // Route::get('/', 'HomeController@index')->name('user_dashboard');
//   // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// // admin protected routes
// Route::group(['middleware' => ['auth', 'admin'], 'prefix' => '/admin'], function () {
//     //Route::get('/', 'HomeController@index')->name('admin_dashboard');
//     Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// });
 Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin_home');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'frontend']);

