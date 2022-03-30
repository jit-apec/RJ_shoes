<?php

namespace App\Modules\Checkout\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Cart\Models\Cart;
use App\Http\Controllers\Controller;
use App\Modules\Cart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\billing;
use App\Modules\Checkout\Models\address;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function create_biling()
    {
        $billing_address = address::where('user_id', Auth::id())->get();
        return view("Checkout::biling_address", compact("billing_address"));
    }
    public function store_address(Request $request)
    {
        $billing_id = $shipping_id = '';
        if ($request->addresses == 0) {
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
            $id = address::create($data);
            $billing_id = $id->id;
        }else{
            $billing_id = $request->addresses;
        }

        if(isset($request->shipping_method) && $request->shipping_method = 1){
            $shipping_id = $billing_id;
        }
        $checkout_arr= [
            'billing_id'=> $billing_id,
            'shipping_id'=> $shipping_id,
        ];

        session()->put('id', $checkout_arr);




        //$address= new address;
        if ($request->addresses == 0) {
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
            $id = address::create($data);
            session::put([
                'id' => json_encode([
                    [
                        'billing_id' => $id->id,
                        //'shipping_id' => $request->addresses
                    ]
                ])
            ]);
            $a = Session::get('id');
            echo $a;
            // dd();
            if ($request->shipping_method == '1') {
                session::put([
                    'id' => json_encode([
                        [
                            'billing_id' => $request->addresses,
                            'shipping_id' => $request->addresses
                        ]
                    ])
                ]);
                return redirect('/order_review')->with('status', 'data successfully added');
            } else {
                return redirect('/shiping_address')->with('status', 'data successfully added');
            }
        } else {

            if (session()->has('id')) {
                $items = Session::get('id', []);
                session::put([
                    'id' => json_encode([
                        [
                            'billing_id' => $request->addresses,
                            'shipping_id' => $request->addresses
                        ]
                    ])
                ]);
                $a = Session::get('id');
                echo $a;
            } else {
            }
            if ($request->shipping_method == '1') {
                session::put([
                    'id' => json_encode([
                        [
                            'billing_id' => $request->addresses,
                            'shipping_id' => $request->addresses
                        ]
                    ])
                ]);
                $a = Session::get('id');
                echo $a;
                dd();
                return redirect('/order_review')->with('status', 'data successfully added');
            } else {
                return redirect('/shiping_address')->with('status', 'data successfully added');
            }
            // return redirect('/shiping_address')->with('status', 'data successfully added');
        }
    }
    public function shiping_address()
    {
        $shipping_address = address::where('user_id', Auth::id())->get();
        return view("Checkout::shiping_address", compact("shipping_address"));
    }
    public function create_order_review()
    {
            $products= new CartController();
           $product= $products->create_cart();
        // $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
        //     ->where('carts.user_id', Auth::id())
        //     ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        // $billing_address = address::where('user_id', Auth::id())->get();
        // $shiping_address = address::where('user_id', Auth::id())->get();
        // if($billing_address["status"]=='1')
        // {
        // dd($billing_address);
        //     return view("Checkout::order_review",compact("product","billing_address","shiping_address"));
        // }
        return view("Checkout::order_review", compact(
            "product",
            "billing_address",
            "shiping_address"
        ));
    }
    public function payment()
    {
        return view("Checkout::payment");
    }
}
