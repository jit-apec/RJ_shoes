<?php

namespace App\Http\Controllers;
use App\Modules\Product\Models\product;
use Illuminate\Http\Request;
use App\Modules\Frontend\Http\Controllers;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if($role=='A')
        {
            return view('admin.dashboard');
        }
        else
        {
            return view('Frontend::index');
        }
    }

}
