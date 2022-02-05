<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Middleware\View;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        // elseif(!Auth::user())
        // {
        // return redirect('login'); // add your desire URL in redirect function
        // }
        // else
        // {
        //     return redirect('admin/dashboard');
        // }
    }
    //     if(Auth::check())
    // {
    //     return View::make('admin/dashboard');
    // }

    // return redirect::route('login')->withInput()->with('errmessage', 'Please Login to access restricted area.');


    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if ($this->auth->guest()) {
    //         if ($request->ajax()) {
    //             return response('Unauthorized.', 401);
    //         } else {
    //             return redirect()->guest('login');
    //         }
    //     }
    //     return $next($request);
    // }
//}
}
