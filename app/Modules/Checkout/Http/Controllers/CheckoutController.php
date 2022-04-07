<?php

namespace App\Modules\Checkout\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Cart\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\order;
use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Modules\Checkout\Models\address;
use App\Modules\Checkout\Models\payment;
use App\Modules\Checkout\Models\orderdetail;

class CheckoutController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function create_biling()
    {
        $cart = Cart::where('user_id', '=', Auth::id())->get();
        if (count($cart)) {
            $billing_address = address::where('user_id', Auth::id())->get();
            return view("Checkout::biling_address", compact("billing_address"));
        } else {
            return redirect('/products');
        }
    }
    public function store_billing_address(Request $request)
    {
        if ($request->addresses == 0) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'status' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'pincode' => 'required',
            ]);
        }
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
        } else {
            $billing_id = $request->addresses;
        }
        if (isset($request->shipping_method) && $request->shipping_method == 1) {
            $shipping_id = $billing_id;
        }
        $checkout_arr = [
            'billing_id' => $billing_id,
            'shipping_id' => $shipping_id,
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
        if ($request->addresses == 0) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'pincode' => 'required',
                'phone_number' => 'required',
            ]);
        }
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
        } else {
            $shipping_id = $request->addresses;
        }

        if (isset($request->shipping_method) && $request->shipping_method == 1) {
            $shipping_id = $shipping_id;
        }
        $checkout_arr = [
            'billing_id' => (int) $billing_id,
            'shipping_id' => $shipping_id,
        ];

        session()->put('checkout', $checkout_arr);

        return redirect('/payment')->with('status', 'data successfully added');
    }
    public function payment()
    {
        return view("Checkout::payment");
    }
    public function store_payment(Request $request)
    {
        $billing_id = Session::get('checkout');
        $id  = $billing_id['billing_id'];
        $user_details = address::where('id', $id)->get()->toArray();
        $data = [
            'user_id' => Auth::id(),
            'first_name' => $user_details[0]["first_name"],
            'last_name' => $user_details[0]["last_name"],
            'status' => $request->payment_method,
        ];
        $payment_data = payment::create($data);

        $payment = [
            'payment_id' => $payment_data->id,
        ];
        session()->put('payment', $payment);
        return redirect('/order_review')->with('status', 'payment method  successfully added');
    }
    public function create_order_review()
    {
        $checkout = Session::get('checkout');
        $billing_id  = (int) $checkout['billing_id'];
        $shipping_id = (int) $checkout['shipping_id'];
        $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        $billing_address = address::where('user_id', Auth::id())
            ->where('id', $billing_id)->get();
        $shiping_address = address::where('user_id', Auth::id())->where('id', $shipping_id)->get();
        return view("Checkout::order_review", compact(
            "product",
            "billing_address",
            "shiping_address"
        ));
    }
    public function create_order(Request $request)
    {

        $session_id = Session::get('checkout');
        $payment_method = Session::get('payment');

        $billing_id  = (int) $session_id['billing_id'];
        $shipping_id = (int) $session_id['shipping_id'];
        $payment_id = (int) $payment_method['payment_id'];

        $data = [
            'user_id' => Auth::id(),
            'billing_id' => $billing_id,
            'shipping_id' => $shipping_id,
            'payment_id' => $payment_id,
            'quantity' => $request->total_quantity,
            'total_price' => $request->total_price,
        ];
        $order = order::create($data);
        foreach ($request->product_id as $key => $value) {
            $tmp = [
                'order_id' => $order->id,
                'product_id' => $value,
                'quantity' => $request->quantity[$key],
                'total_price' => $request->price[$key]
            ];
            orderdetail::create($tmp);
            Product::where('id', $value)->decrement('stock', $request->quantity[$key]);
        }
        Cart::where('user_id', Auth::id())->delete();
        Session::flash('checkout', 'payment');
        return redirect('/thanks')->with('success', 'Order Successfull!!');
    }

    public function thank_you()
    {
        return view('Checkout::order_success');
    }
}
