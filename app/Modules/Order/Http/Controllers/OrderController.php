<?php

namespace App\Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Checkout\Models\order;

class OrderController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Order::welcome");
    }
    public function create()
    {
        $order= order::all();
        return view("Order::display",compact('order'));
        
    }
}
