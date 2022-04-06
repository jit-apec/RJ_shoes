<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Modules\Order\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Modules\Product\Models\product;
use App\Modules\Frontend\Http\Controllers;
use App\Models\User;

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
        $products=product::all()->count();
        $users=User::where('role','=','U')->count();
        $orders=Order::select('total_price','id')->get();
      //  dd($products,$users,$orders);

        return view('admin.dashboard',compact('products','orders','users'));

       // return view('admin.dashboard');
    }

}
