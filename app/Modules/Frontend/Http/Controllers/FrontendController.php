<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Modules\Product\Models\Productimage;
use App\Modules\Colors\Models\Colors;
use App\Modules\Brand\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\product;

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
    // public function grid()
    // {
    //     $products = Product::where('status', 'Y')->get();
    //      return view("Frontend::gridview", compact('products'));
    // }
    // public function list()
    // {
    //     $products = Product::where('status', 'Y')->get();
    //      return view("Frontend::listview", compact('products'));
    // }
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

    public function price_filter(Request $request)
    {
        $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->get();
        if (isset($request->brand))
        {
            $products=Product::whereIn('brand_id',$request->id)->where('status','Y')->get();
        }
        if ($request->view == 'true') {
            return view('Frontend::gridview', compact('products'));
        } else {
            return view('Frontend::listview', compact('products'));
        }
        return  view("Frontend::products",compact('products'));
    }
    // public function price_filter(Request $request)
    // {

    //   $products=Product::whereBetween('price',[(int)$request->minimum,(int)$request->maximum])->get();
    //  // $products=json_encode($product);
    //    return  compact('products');
    // }

}
