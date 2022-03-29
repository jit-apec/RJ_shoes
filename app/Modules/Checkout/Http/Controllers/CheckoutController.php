<?php

namespace App\Modules\Checkout\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Cart\Models\Cart;
use App\Http\Controllers\Controller;
use App\Modules\Cart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\billing;

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
        $data = [
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'status' => $request->shipping_method,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'pincode' => $request->pincode,

        ];
        billing::create($data);
        if ($request->shipping_method == '1') {
            return redirect('/order_review')->with('status', 'data successfully ');
        }
        else{
            return redirect('/shiping_address')->with('status', 'data successfully ');
        }
    }
    public function shiping_address()
    {
        return view("Checkout::shiping_address");
    }
    public function create_order_review()
    {
    //     $products= new CartController();
    //    $product= $products->create_cart();
        $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
        ->where('carts.user_id', Auth::id())
        ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
      $billing_address = billing::where('user_id', Auth::id())->get();
        // if($billing_address["status"]=='1')
        // {
       // dd($billing_address);
        //     return view("Checkout::order_review",compact("product","billing_address","shiping_address"));
        // }


        return view("Checkout::order_review",compact("product","billing_address"));
    }
    public function payment()
    {
        return view("Checkout::payment");
    }
}
