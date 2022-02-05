<?php

namespace App\Http\Middleware;
//use session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path =$request->path();
        // if((!Session::get('user')) )
        // {
        //     return redirect('/');
        // }
        // else{
        //     return redirect('/admin/dashboard');
        // }
        return $next($request);
    }
}

// if(($path =="login"||$path == "register") && Session::get('user'))
// {
//     return redirect('/admin/dashboard');
// }
// else
