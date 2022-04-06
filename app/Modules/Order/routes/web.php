<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Order\Http\Controllers\OrderController;

Route::group(['prefix' =>'/admin/order','middleware'=> ['auth']],function(){
    Route::get('/',[OrderController::class,'create']);
    Route::get('/order_view/{id}',[OrderController::class,'order_view']);
    Route::get('/edit/{id}',[OrderController::class,'create_edit']);
    Route::post('/edit/{id}',[OrderController::class,'update']);
});
