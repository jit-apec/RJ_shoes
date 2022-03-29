<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Checkout\Http\Controllers\CheckoutController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/biling_address', [CheckoutController::class, 'create_biling']);
    Route::post('/biling_addres',[CheckoutController::class, 'store_biling']);
    Route::get('/shiping_address', [CheckoutController::class, 'shiping_address']);
    Route::get('/order_review', [CheckoutController::class, 'order_review']);
    Route::get('/payment', [CheckoutController::class, 'payment']);
});
