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
    public function dropdown(){

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

    public function insert (Request $request)
   {
    $product = new Product;
    if($request->hasfile('subimage'))
    {
        $simg=[
            'image'=>$request->subimage,
        ];
    //    dd($simg);
       foreach($simg as $image)
       {

           $image=$request->file('subimage');
        //    foreach($image as $img){

        //     $ext = $img->extension();
        //     $image_name=$img;
        //     print_r($image_name);
        //     $img->storeAs('\public\media',$image_name);
        //     echo '<pre>';
        //        print_r($image_name);
        //     $product->image=$image_name;
        //    $data[] = $image_name;
        // }die;
        //   dd($data);


           $ext=$image->extension();

            $image_name=$image;
            print_r($image_name);
            $image->storeAs('/public/media',$image_name);
            $product->image=$image_name;
           $data[] = $image_name;


           //dd($data);
       }
       //dd($file);

    }

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

    $pid = $product->id;
    $store_sort_value =  $request->sort;

    //    if($request->hasFile('subimage.$key')){

    //     $rand= rand('11111111', '99999999');
    //     $subimage=$request->file('subimage.$key');
    //     $ext=$subimage->extension();
    //     $image_name=$rand.'.'.$ext;
    //     $request->file('subimage.$key')->storeAs('/public/media',$image_name);
    //     $sub_image['subimage']=$image_name;

    //  }
    // else {


    //     $sub_image['subimage']='';
    // }
        //13-feb
    //     if($request->hasfile('subimage'))
    //     {
    //        foreach($request->file('subimage') as $file)
    //        {
    //            $name = time().'.'.$file->extension();
    //            //$file->move(public_path().'/public/media', $name);
    //            $str= $image->storeAs('/public/media',$name);
    //            $data[] = $name;
    //            //dd($file);
    //        }
    //     }

    //    dd($data);
    //     $product= new product();
    //     $product->subimage=json_encode($data);
    //     $product->save();






    //12-feb
    // $img=[];
    // if($request->hasFile('subimage')){
    //     foreach($request->file('subimage') as $file)
    //     {
    //         $name=$request->hasFile('image');
    //         $ext=$image->extension();
    //        $name = time().rand(1,100).'.'.$file->extension();
    //        $str= $image->storeAs('/public/media',$name);
    //         $img[] = $str;

        // $rand= rand('11111111', '99999999');
        // $subimage=$request->file('subimage.$key');
        // $ext=$subimage->extension();
        // $image_name=$rand.'.'.$ext;
        // $request->file('subimage.$key')->storeAs('/public/media',$image_name);
        // $sub_image['subimage']=$image_name;

    //     }
    //  }
    //  dd($img);
    // $product->images=$img;



    //    $store_title_value =  $request->title;

       // foreach($store_sort_value as $key => $value)
        // {
        //$sub_image['product_id']=$pid;
        // $sub_image['images']=  $img;
      //  $sub_image['sort']=$store_sort_value[$key];
        //  DB::table('productimage')->insert($img);
      //  }
    return back();
}

        public function product_view()
        {
            return view("Product::productdisplay");
        }

}

