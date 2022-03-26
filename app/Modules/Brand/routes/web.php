<?php

use App\Modules\Brand\Http\Controllers\BrandController;

use Illuminate\Support\Facades\Route;

Route::get('profile', function () {
    //this code is user to access denied  to unauthorize user and redirect to login page
})->middleware('auth');
// Route::Middleware(['Auth','Admin]'])->group(function() {
//     Route::get('/admin',function() {
//         return view('admin.dashboard');
//     });
// });
// route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//     return "this page requires that you be logged in and an Admin";
// }]);
Route::group(['prefix'=>'/admin/brand/','middleware'=>['auth']] ,function(){

Route::get('display', [BrandController::class, 'display']);
Route::get('addBrands', [BrandController::class, 'create']);
Route::get('addbrand', [BrandController::class, 'add']);
Route::post('addbrand', [BrandController::class, 'add']);
Route::get('editbrand/{id}', [BrandController::class, 'edit']);
Route::post('editbrand/{id}', [BrandController::class, 'update']);
Route::get('movetrash', [BrandController::class, 'delete']);
Route::get('trashbrand', [BrandController::class, 'trash']);
Route::get('restorebrand', [BrandController::class, 'restore']);
Route::get('changebrandstatus', [BrandController::class, 'changestatus']);
route::get('uniquename', [BrandController::class, 'checkurl']);
});
