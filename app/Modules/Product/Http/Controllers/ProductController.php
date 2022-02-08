<?php

namespace App\Modules\Product\Http\Controllers;
use App\Modules\Product\Models\product;
use App\Http\Controllers\Controller;
use App\Modules\Colors\Models\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Product::welcome");

    }
    //below code for get dropdown list data
    public function addproduct(){

        $Product1 = DB::table('colors')->select('name as cname','id as cid')->where(['status'=>'Y'])->get();
        $Product2 =  DB::table('brands')->select('name as bname','id as bid')->where(['status'=>'Y'])->get();
        return view('Product::addproduct',['colors' => $Product1, 'brands' => $Product2]);
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

    public function insert (Request $request)
   {
    $product = new Product;

     if($request->hasFile('image')){

        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $product->image=$image_name;

     }
     $product->name=$request->name;
    $product->idealfor=$request->idealfor;
    $product->upc=$request->upc;
    $product->url=$request->url;
    $product->size=$request->size;
    $product->price=$request->price;
    $product->stock=$request->stock;
    $product->description=$request->discription;
    $product->color_id=$request->color_id;
    $product->brand_id=$request->brand_id;
    $uid = Auth::user()->id;
    $product->user_id=$uid;
    $product->save();

    return back();

}


}

