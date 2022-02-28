<?php

namespace App\Modules\Frontend\Http\Controllers;
use App\Modules\Product\Models\Productimage;
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
    public function grid()
    {
        $product = Product::all();
         return view("Frontend::gridview", compact('product'));
    }
    public function list()
    {
        $product = Product::all();
         return view("Frontend::listview", compact('product'));
    }
    public function view($url)
    {
        $products = Product::where('url', $url)
        ->where('status',array('Y'))->get();
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id=json_decode($id,true);
        $subimage=Productimage::where('product_id',$filter_id)->orderBy('sort','asc')->get();
        return view("Frontend::details", compact('products','subimage'));
    }

}
