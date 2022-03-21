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
        //$product=Cart::all();
        // $a = Session::get(json_decode('cart', true));
        // $b= Cart::content();
        // $myobj=JSON.parse($a);
        //    echo $a['cart'][1];
            // $count=$a["cart"];
    //echo "<pre>";
   // print_r(cart['product_id']);

            //var_dump(json_decode( $count));
        //=Session::get('cart');
        // $c=$a[$b];
        // $d= array_flip ($a);
        // print_r(array_keys($a, 4));
        //  dd(json_decode($a));
        // var_dump($a);
        // foreach (json_decode( $count) as $key => $value) {
        //     var_dump(get_object_vars($value));
        //     echo "$key: $value <br>";
        // }
       // dd($b);

        // session()->flash('success', 'Cart updated successfully');
       // return redirect('Cart::cart', compact('a'));
       //$colors = Colors::join('users', 'users.id', '=', 'colors.user_id')->where('status', array('T'))->get(['colors.*', 'users.username']);

       $cart=Cart::join('products', 'products.id', '=', 'carts.product_id')
       ->where('carts.user_id', Auth::id())
       ->get(['products.*','carts.id as cid','carts.quantity as quantity']);
         return view("Cart::cart",compact("cart"));
    }
    public function remove_product(Request $request){
       Cart::where('id',$request->id)->delete();

    //   if(isset($request->product_id) && isset($request->user_id))
      // where(['id' => $request->id])->where('product_id', $id)->delete();
       // Cart::where('id',$request->id)->update(['status'=>$r->status]);
    }
    public function update(Request $request){

        $request->validate([
            'quantity' => 'required|digits_between:1,5',
        ]);
        // $data = Product::where('stock', '>=' ,$request->quantity)->where('id', $request->id)->get();
        // dd(count($data));
        // if (count($data)) {
       Cart::where('id',$request->id)
        ->update(['quantity' => $request->quantity]);
       $qty =Cart::select('quantity','price')->join('products', 'products.id', '=', 'carts.product_id')->where('id',$request->id)->first();
            //$price=$request->quantity * $qty->quantity;
            echo $qty;
           /// dd($price );
          // var_dump($qty);
            dd($qty);
      //  session()->flash('success', 'Cart updated successfully');
       // return view("Cart::cart",compact("cart"));
       // }
    }
}
