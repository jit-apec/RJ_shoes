<?php

namespace App\Modules\Checkout\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Cart\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\order;
use Illuminate\Support\Facades\Session;
use App\Modules\Checkout\Models\address;
use App\Modules\Checkout\Models\orderdetail;
use App\Modules\Cart\Http\Controllers\CartController;

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
    public function store_billing_address(Request $request)
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
            $checkout = address::create($data);
            $billing_id = $checkout->id;
        }else{
            $billing_id = $request->addresses;
        }

        if(isset($request->shipping_method) && $request->shipping_method == 1){
            $shipping_id = $billing_id;
        }
        $checkout_arr= [
            'billing_id'=> $billing_id,
            'shipping_id'=> $shipping_id,
        ];

        session()->put('checkout', $checkout_arr);

        if ($request->shipping_method == '1') {

            return redirect('/payment')->with('status', 'data successfully added');
        } else {
            return redirect('/shiping_address')->with('status', 'data successfully added');
        }
    }
    public function shiping_address()
    {
        $shipping_address = address::where('user_id', Auth::id())->get();
        return view("Checkout::shiping_address", compact("shipping_address"));
    }
    public function store_shipping_address(Request $request)
    {
        $a = Session::get('checkout');
        $billing_id  = $a['billing_id'];
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
            $checkout = address::create($data);
            $shipping_id = $checkout->id;
        }else{
            $shipping_id = $request->addresses;
        }

        if(isset($request->shipping_method) && $request->shipping_method == 1){
            $shipping_id = $shipping_id;
        }
        $checkout_arr= [
            'billing_id'=>(int) $billing_id,
            'shipping_id'=> $shipping_id,
        ];

        session()->put('checkout', $checkout_arr);
        return redirect('/payment')->with('status', 'data successfully added');
    }
    public function payment()
    {
        return view("Checkout::payment");
    }
    public function create_order_review()
     {
    //         $products= new CartController();
    //        $product= $products->create_cart();
        $a = Session::get('checkout');
        $billing_id  =(int) $a['billing_id'];
        $shipping_id=(int) $a['shipping_id'];
        $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        $billing_address = address::where('user_id', Auth::id())
                        ->where('id',$billing_id)->get();
        $shiping_address = address::where('user_id', Auth::id())->where('id',$shipping_id)->get();
        return view("Checkout::order_review", compact(
            "product",
            "billing_address",
            "shiping_address"
        ));
    }
    public function create_order(Request $request){
        $a = Session::get('checkout');
        $billing_id  =(int) $a['billing_id'];
        $shipping_id=(int) $a['shipping_id'];
        // $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
        // ->where('carts.user_id', Auth::id())
        // ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        // $cart=Cart::where('user_id', Auth::id())->get();
        // dd($cart)
      //  dd($request->quantity);
        $data=[
            'user_id'=>Auth::id(),
            'billing_id'=>$billing_id,
            'shipping_id'=>$shipping_id,
            'quantity'=>$request->total_quantity,
            'total_price'=>$request->total_price,
        ];

       $order= order::create($data);
       $data=[];
       foreach ($request->product_id as $id)
       {
           $data[]=[
               'product_id' =>$request->product_id,
               'quantity' =>$request->quantity,
               'total_price'=>$request->price,
           ];
           break;
       }
       dd($data);
       $data1=[
                'order_id'=> $order->id,
                'total_price'=>$request->total_price,

       ];
       orderdetail::create($data);
       // $qty = $product->quantity;
    }

}
