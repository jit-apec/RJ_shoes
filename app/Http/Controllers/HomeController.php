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
          //  $this->middleware('auth');
        }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function index2()
    {
        return view('viewnot');
    }



}
