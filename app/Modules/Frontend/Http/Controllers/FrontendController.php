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
use Response;
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
                ->get();
        } elseif (isset($request->color) && (isset($request->brand))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->brand) && (isset($request->size))) {
            $products = Product::whereIn('brand_id', $request->brand)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->color) && (isset($request->size))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by, $request->order_by)
                ->get();
        } elseif (isset($request->brand)) {
            $products = Product::where('brand_id', $request->brand)
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

              //  return response()->json(['success' => 'data added successfully']);
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
            // Cart::session(array(
            //     'product_id'=>$request->id,
            //     'user_id'=>$Uid,
            //     'quantity'=>$request->quantity
            // ));
            // Session::put('cart', $data);

           // echo "session data added";
          //  return response()->json()->with('status','data added');
          // return redirect("")->with('status', 'Profile updated!');
        //    return redirect("")->json([
        //        'message'=>'Profile updated',

        //    ]);
        }

    }
}
