<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Checkout\Http\Controllers\CheckoutController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/biling_address', [CheckoutController::class, 'create_biling']);
    Route::post('/store_address',[CheckoutController::class, 'store_address']);
    Route::get('/shiping_address', [CheckoutController::class, 'shiping_address']);
    Route::get('/order_review', [CheckoutController::class, 'create_order_review']);
    Route::get('/payment', [CheckoutController::class, 'payment']);
});
