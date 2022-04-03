<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Order\Http\Controllers\OrderController;

Route::group(['prefix' =>'/admin/order','middleware'=> ['auth']],function(){
    Route::get('/',[OrderController::class,'create']);
});
