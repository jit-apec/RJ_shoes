<?php
use Illuminate\Support\Facades\Route;
use App\Modules\Checkout\Http\Controllers\CheckoutController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/biling_address', [CheckoutController::class, 'create_biling']);
    Route::post('/store_address',[CheckoutController::class, 'store_billing_address']);
    Route::get('/shiping_address', [CheckoutController::class, 'shiping_address']);
    Route::post('shipping_address',[CheckoutController::class, 'store_shipping_address']);
    Route::get('/payment', [CheckoutController::class, 'payment']);
    Route::get('/order_review', [CheckoutController::class, 'create_order_review']);
    Route::post('/order',[CheckoutController::class, 'create_order']);
});
