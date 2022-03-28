<?php

namespace App\Providers;

use App\Modules\Cart\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //  Paginator::useBootstrap();
      view()->composer('*', function ($view2)
      {
          $cartt = Cart::where('user_id', Auth::id())->get();
          $view2->with('cartt', $cartt );
      });

    }
}
