<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Models\product;
use App\Modules\Colors\Models\Colors;
use App\Modules\Brand\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
    public function dropdown(){

        $colors = Colors::select('name as cname','id as cid')->where(['status'=>'Y'])->get();
        $brand =  Brand::select('name as bname','id as bid')->where(['status'=>'Y'])->get();
        return view('Product::addproduct',['colors' => $colors, 'brands' => $brand]);
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
     if($request->hasFile('subimage'))
     {
         foreach($request->file('subimage') as $k=>$image)
         {
             if ($request->input('sort')[$k])
             {
                 DB::table('productimage')->insert(['product_id'=>$product->id,'images'=>$request->upc.'_'.$k.'.png','sort'=>$request->input('sort')[$k]]);
             }
             else {
                 DB::table('productimage')->insert(['product_id'=>$product->id,'images'=>$request->upc.'_'.$k.'.png']);
             }
         $image->storeAs('/public/media' , $request->upc.'_'.$k.'.png');
       }
     }
     return back();
    }

    public function display(){
        $Product = Product::Join('colors', 'colors.id', '=', 'products.color_id')
        // ->join('users', 'users.id', '=', 'products.user_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.status',array('Y'))
            ->orWhere('products.status',array('N'))
            ->get(['products.*', 'colors.name as cname','brands.name as bname']);
        return view("Product::display",['products'=>$Product]);

    }
    public function changestatus(Request $r)
    {
        $product = Product::find($r->id);
        $product->status = $r->status;
        $product->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function trashdisplay(){
        $Product = Product::join('colors', 'colors.id', '=', 'products.color_id')
           ->join('brands', 'brands.id', '=', 'products.brand_id')
           ->where('products.status',array('T'))
           ->get(['products.*', 'colors.name as cname','brands.name as bname']);
     return view("Product::trash",['product'=>$Product]);
    }

    public function movetotrash(Request $r)
    {
        $update = Product::find($r->id);
        $update->status='T';
        $update->save();
       return Product::all();
    }

     // restore
     public function restore(Request $r)
     {
         $update = Product::find($r->id);
         $update->status='Y';
         $update->save();
         return Product::all();
     }
     public function edit($id)
     {
        $product = Product::find($id);
        $brand = Product::join('brands', 'brands.id', '=', 'products.brand_id')->where('products.id',$id)
        ->get(['brands.id as bid', 'brands.name as bname']);
        $colors = DB::table('colors')->select('name as cname','id as cid')->where(['status'=>'Y'])->get();
         return view('Product::edit',['brands' => $brand],compact(['colors','product']));
    }
    public function update(Request $request,$id)
    {
        $Aid = Auth::id();
        $data=[

            'name'=>$request->name,
            'idealfor'=>$request->idealfor,
            'url'=>$request->url,
            'size'=>$request->size,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'color_id' =>$request->color_id,
            'user_id'=>$Aid,
        ];
        if($request->hasFile('image')){

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $data['image']="$image_name";
         }
        Product::where('id', $id)->update($data);
        //return view("Product::display");
       return back()->with(' Product updated successfully');
    }


    public function product_view($url)
    {
            $product = Product::
            //select('products.*','productimage.images','productimage.sort')
        //    ->join('productimage','productimage.id','=','products.id')

            where('url', $url)
            ->get();
        return view("Product::productdisplay",compact('product'));

    }

}

