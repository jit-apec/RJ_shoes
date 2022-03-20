<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Modules\Product\Models\Productimage;
use App\Modules\Colors\Models\Colors;
use App\Modules\Brand\Models\Brand;
use App\Modules\Cart\models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\product;
use Illuminate\Support\Facades\Session;
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
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id = json_decode($id, true);
        $subimage = Productimage::where('product_id', $filter_id)->orderBy('sort', 'asc')->get();
        return view("Frontend::details", compact('products', 'subimage'));
    }
    public function filter(Request $request)
    {
        //dd($request->color);
        if (isset($request->color) && (isset($request->brand)) && (isset($request->size))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('size', $request->size)
                ->where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color) && (isset($request->brand))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->brand) && (isset($request->size))) {
            $products = Product::whereIn('brand_id', $request->brand)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color) && (isset($request->size))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->brand)) {
            $products = Product::where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color)) {
            $products = Product::whereIn('color_id', $request->color)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
            // ->get();
        } elseif (isset($request->size)) {
            $products = Product::whereIn('size', $request->size)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
        } else {
            $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->orderBy($request->sort_by, $request->order_by)
                ->paginate($request->show_product);
            //->get();
        }
        if ($request->view == 'true') {
            return view('Frontend::gridview', compact('products'));
        } else {
            return view('Frontend::listview', compact('products'));
        }
        return  view("Frontend::products", compact('products'));
    }
    public function addcart(Request $request)
    {
        $request->validate([
            'quantity' => 'required|digits_between:1,5',
        ]);
        $Uid = Auth::id();
        $data = Product::where('stock', '>=' ,$request->quantity)->where('id', $request->id)->get();
        if (count($data)) {
            Cart::create(['product_id' => $request->id, 'user_id' => $Uid, 'quantity' => $request->quantity]);
            session::put([
                'cart' => json_encode([
                    [
                        'product_id'=>$request->id,
                        'user_id'=>$Uid,
                        'quantity'=>$request->quantity
                    ]
                ])
              ]);
            // Cart::session(array(
            //     'product_id'=>$request->id,
            //     'user_id'=>$Uid,
            //     'quantity'=>$request->quantity
            // ));
          // Session::put('cart', $data);
            //  $a=Session::get('cart');
            //   echo $a;
            // session()->flash('success', 'Cart updated successfully');
            //   return redirect('Cart::cart',compact('a'));
            return response()->json(['success' => 'data added successfully']);
        } else {

            return response()->json(['success'=>'Invalid Input']);
        }
    }
}
