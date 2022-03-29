<?php

namespace App\Modules\Checkout\Http\Controllers;

use App\Modules\Checkout\Models\Billing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function create_biling()
    {
        return view("Checkout::biling_address");
    }
    public function store_biling(Request $request)
    {
        $data=[
            'user_id'=>Auth::id(),
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'status'=>$request->shipping_method,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'Address'=>$request->address,
            'pincode'=>$request->pincode,

        ];
       // dd($data);
       Billing::create($data);
    }
    public function shiping_address()
    {
        return view("Checkout::shiping_address");
    }
    public function order_review()
    {
        return view("Checkout::order_review");
    }
    public function payment()
    {
        return view("Checkout::payment");
    }
}
