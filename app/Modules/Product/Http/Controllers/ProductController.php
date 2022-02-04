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
    public function display(){


        return view("Product::display");

        $productdisplay=product::join('colors','colors.id','=','brands.user_id')->where('status',array('Y'))-> orWhere('status',array('N'))
        ->get(['product.*', 'users.username','colors.name'],'brands.name');
        return view('Product::display',['list'=>$productdisplay]);
    }

}

