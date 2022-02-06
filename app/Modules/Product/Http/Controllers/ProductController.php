<?php

namespace App\Modules\Product\Http\Controllers;
use App\Modules\Product\Models\product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Product::welcome");

    }

    public function addproduct(){

        return view("Product::addproduct");
    }
    public function display(){
            $Product = Product::Join('colors', 'colors.id', '=', 'products.color_id')
           // ->join('users', 'users.id', '=', 'products.user_id')
              ->join('brands', 'brands.id', '=', 'products.brand_id')
              ->where('products.status',array('Y'))
              ->orWhere('products.status',array('N'))
              ->get(['products.*', 'colors.name as cname','brands.name as bname']);
        //   $Product= Product::input();
            return view("Product::display",['products'=>$Product]);

    }
    public function trashdisplay(){
        $Product = Product::join('colors', 'colors.id', '=', 'products.color_id')
           ->join('brands', 'brands.id', '=', 'products.brand_id')
           ->where('products.status',array('T'))
           ->get(['products.*', 'colors.name as cname','brands.name as bname']);
           //  $Product= Product::all();
     return view("Product::trash",['product'=>$Product]);
    }
}

