<?php

namespace App\Modules\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cart\models\Cart;
use App\Modules\Product\models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Cart::welcome");
    }
    public function create_cart()
    {
        $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', Auth::id())
            ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        return view("Cart::cart", compact("cart"));
    }
        public function remove_product(Request $request)
        {
            Cart::where('id', $request->id)->delete();
        }
    public function update(Request $request)
    {
        $request->validate([
            'quantity' => 'required','regex:/[1-5]/',
        ]);
        $data = Product::where('stock', '>=', $request->quantity)
            ->where('id', $request->id)
            ->get();
        $price = $request->price * $request->quantity;

          // dd($price);
        if (count($data)) {
            Cart::updateOrInsert(
                [
                    'product_id' => $request->id,
                    'user_id' => Auth::id(),
                ],
                [
                    'quantity' => $request->quantity
                ]
            );
            return response()->json([
                'price'=>$price,
               'message' => "Data Found",
               'code' => 200,
              // 'data' => $data,
           ]);

        }
        else
        {
            return response()->json(['success' => 'Invalid Input']);
        }
    }
}
