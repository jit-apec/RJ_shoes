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
        $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->get();

        // if(){

        // }

        if ($request->view == 'true') {
            return view('Frontend::gridview', compact('products'));
        } else {
            return view('Frontend::listview', compact('products'));
        }
    }
}
