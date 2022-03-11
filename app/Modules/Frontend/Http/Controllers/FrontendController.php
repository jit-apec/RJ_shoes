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
        if (isset($request->color) && (isset($request->brand)) && (isset($request->size))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('size', $request->size)
                ->where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color) && (isset($request->brand))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->brand) && (isset($request->size))) {
            $products = Product::whereIn('brand_id', $request->brand)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color) && (isset($request->size))) {
            $products = Product::whereIn('color_id', $request->color)
                ->where('size', $request->size)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->brand)) {
            $products = Product::where('brand_id', $request->brand)
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->where('status', 'Y')
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } elseif (isset($request->color)) {
            $products = Product::whereIn('color_id', $request->color)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
               // ->get();
        } elseif (isset($request->size)) {
            $products = Product::whereIn('size', $request->size)->where('status', 'Y')
                ->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
                ->orderBy($request->sort_by,$request->order_by)
                ->paginate($request->show_product);
        } else {
            $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])
            ->orderBy($request->sort_by,$request->order_by)
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
}
