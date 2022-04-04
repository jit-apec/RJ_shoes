<?php

namespace App\Modules\Frontend\Http\Controllers;
use Illuminate\Http\Request;
use App\Modules\Cart\models\Cart;
use App\Modules\Brand\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Colors\Models\Colors;
use App\Modules\Checkout\Models\order;
use App\Modules\Product\Models\product;
use Illuminate\Support\Facades\Session;
use App\Modules\Checkout\Models\address;
use App\Modules\Checkout\Models\orderdetail;
use App\Modules\Product\Models\Productimage;

class FrontendController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function frontend()
    {
        return view('Frontend::index');
    }
    public function product()
    {
        $color = Colors::where('status', 'Y')->get();
        $brand = Brand::where('status', 'Y')->get();
        $products = Product::where('status', 'Y')->get();
        return view("Frontend::products", compact('products', 'color', 'brand'));
    }
    public function view($url)
    {
        $products = Product::where('url', $url)
            ->where('status', array('Y'))->get();
        $get_product_id = Product::where('url', $url)
                        ->get(['id'])->first();
        $product_id = json_decode($get_product_id, true);
        $subimage = Productimage::where('product_id', $product_id)
                                ->orderBy('sort', 'asc')
                                ->get();
        $cart=Cart::where('user_id', Auth::id())
                    ->where('product_id', $product_id)
                    ->get('product_id');
        return view("Frontend::details", compact('products', 'subimage','cart'));
    }
    public function filter(Request $request)
    {
        if (isset($request->color) && isset($request->brand) && isset($request->size)) {
            $products = Product::whereIn('color_id', $request->color)
                ->whereIn('size', $request->size)
                ->whereIn('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->color) && isset($request->brand)) {
            $products = Product::whereIn('color_id', $request->color)
                ->whereIn('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->brand) && (isset($request->size))) {
            $products = Product::whereIn('brand_id', $request->brand)
                ->whereIn('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->color) && isset($request->size)) {
            $products = Product::whereIn('color_id', $request->color)
                ->whereIn('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->brand)) {
            $products = Product::whereIn('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->color)) {
            $products = Product::whereIn('color_id', $request->color)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->size)) {
            $products = Product::whereIn('size', $request->size)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } else {
            $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        }
        if (count($products)) {
            if ($request->view == 'true') {
                return view('Frontend::gridview', compact('products'));
            } else {
                return view('Frontend::listview', compact('products'));
            }
            return  view("Frontend::products", compact('products'));
        } else {
            return view('Frontend::productnotfound');
        }
    }
    public function addcart(Request $request)
    {
        $Uid = Auth::id();
        $data = Product::where('stock', '>=', $request->quantity)
            ->where('id', $request->id)
            ->get()->toArray();
        if (Auth::check())
        {
            if (count($data)) {
                Cart::updateOrInsert(
                    [
                        'product_id' => $request->id,
                        'user_id' => $Uid,
                    ],
                    [
                        'quantity' => $request->quantity
                    ]
                );

               // return redirect('/product/cart')->with('status', 'product added successfully!!');
                return response()->json(['success' => 'data added successfully']);
            }
            else
             {
              //  return response()->json('success', 'Invalid Input!');
                echo "invalid data.";
            }
        }
        else
        {
            session::put([
                'cart' => json_encode([
                    [
                        'product_id' => $request->id,
                        'name' => $data[0]['name'],
                        'price' => $data[0]['price'],
                        'quantity' => $request->quantity,
                        'image'=>$data[0]['image'],
                        'url'=>$data[0]['url'],
                        'cid'=>$data[0]['id'],
                    ]
                ])
            ]);
            $a = Session::get('cart');
            echo $a;
        }

    }

    public function myorder() {
        $address=order::where('user_id',Auth::id())
                        ->get()
                        ->toArray();
        $billing_id=array_column($address,'billing_id');
        $shipping_id=array_column($address,'shipping_id');
        $order_id=array_column($address,'order_id');
        //dd(array_keys($address));
        // $product = Cart::join('products', 'products.id', '=', 'carts.product_id')
        //                 ->where('carts.user_id', Auth::id())
        //                 ->get(['products.*', 'carts.id as cid', 'carts.quantity as quantity']);
        $product=orderdetail::join('products','products.id', '=','orderdetails.product_id')
                             -> where('order_id',$order_id)
                             ->get(['products.*','orderdetails.total_price','quantity']);

        $billing_address = address::where('user_id', Auth::id())
                        ->where('id',$billing_id)
                        ->get();
       // dd($billing_address);
        $shiping_address = address::where('user_id', Auth::id())
                        ->where('id',$shipping_id)
                        ->get();
        return view("Frontend::myorder", compact(
            "product",
            "billing_address",
            "shiping_address"
        ));
    }
}
