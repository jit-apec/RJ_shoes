<?php

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Checkout\Models\order;
use Illuminate\Http\Request;
use App\Modules\Checkout\Models\orderdetail;

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
        $address = Order::where('orders.id', $id)
            ->join('payments', 'payments.id', '=', 'orders.payment_id')
            ->first();
        $order = Order::where('orders.id', $id)->first();
        $order_details = orderdetail::where('order_id', $id)
            ->join('products', 'products.id', '=', 'orderdetails.product_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->get(['products.*', 'orderdetails.*', 'brands.name as brand_name', 'colors.name as color_name']);
        return view("Order::order_view", compact('address', 'order', 'order_details'));
    }
    public function create_edit($id)
    {
        $status = order::where('id', $id)->first();
        return view("Order::edit", compact('status'));
    }
    public function update(Request $request, $id)
    {
        Order::where('id',$id)->update(['order_status'=> $request->status]);
         return back()->with('status', 'Data Update Successfully');
    }
}
