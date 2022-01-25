<?php
use App\Modules\Colors\Http\Controllers\ColorsController;
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

Route::get('/home', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('welcome',[ColorsController::class,'welcome']);

// Route::get('/welcome', [App\Http\Controllers\ColorsController::class, 'welcomes'])->name('welcomes');

