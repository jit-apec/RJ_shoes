<?php

namespace App\Modules\Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Cart\models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
    public function create_cart(){
        //$product=Cart::all();
        $a=Session::get(json_decode('cart'));

        $b='product_id';
       // $c=$a[$b];
      $d= array_flip ($a);
      print_r(array_keys($a, 4));
      //  dd(json_decode($a));
        dd($d);
       // session()->flash('success', 'Cart updated successfully');
            return redirect('Cart::cart',compact('a'));
       // return view("Cart::cart",compact("product"));
    }

}
