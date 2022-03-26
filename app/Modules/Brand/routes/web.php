<?php

use App\Modules\Brand\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin/brand', 'middleware' => ['auth']], function () {
    Route::get('/', [BrandController::class, 'display']);
    Route::get('/add', [BrandController::class, 'create']);
    Route::post('/add', [BrandController::class, 'add']);
    Route::get('/editbrand/{id}', [BrandController::class, 'edit']);
    Route::post('/editbrand/{id}', [BrandController::class, 'update']);
    Route::get('/movetrash', [BrandController::class, 'delete']);
    Route::get('/trashbrand', [BrandController::class, 'trash']);
    Route::get('/restorebrand', [BrandController::class, 'restore']);
    Route::get('/changebrandstatus', [BrandController::class, 'changestatus']);
    route::get('/uniquename', [BrandController::class, 'checkurl']);
});
