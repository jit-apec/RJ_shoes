<?php

namespace App\Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Checkout\Models\order;
use App\Modules\Checkout\Models\address;
use App\Modules\Checkout\Models\payment;

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
        $order = order::join('payments', 'payments.id', '=', 'orders.payment_id')
            ->get(['orders.*', 'orders.id as order_id', 'payments.*']);
        return view("Order::display", compact('order'));
    }
    public function order_view($id)
    {

        $address = order::where('id', $id)
            ->get()
            ->toArray();
        $billing_id = array_column($address, 'billing_id');
        $shipping_id = array_column($address, 'shipping_id');
        $order_id = array_column($address, 'order_id');
        $payment = array_column($address, 'payment_id');

        $billing_address = address::where('id', $billing_id)
            ->get();
        $shiping_address = address::where('id', $shipping_id)
            ->get();
        $payment=payment::where('id', $payment)->get();

        $order=Order::join('orderdetails','orders.id','=','orderdetails.order_id')
        ->join('products','products.id', '=', 'orderdetails.product_id')
        ->where('orders.id',$id)
        ->get(['products.*','orderdetails.*','orderdetails.total_price as sub_total','orders.total_price as tot_price']);


        // dd($order);

        return view("Order::order_view", compact('billing_address', 'shiping_address','payment','order'));
    }
}
