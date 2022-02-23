<?php

namespace App\Modules\Product\Http\Controllers;

use App\Modules\Product\Models\product;
use App\Modules\Product\Models\Productimage;
use App\Modules\Colors\Models\Colors;
use App\Modules\Brand\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Modules\Product\Http\Controllers\Session;
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
        $request->validate(['name'=>'required',
         'image' =>'mimes:jpg,png,jpeg,gif',
        //'subimage[]' => 'mimes:jpg,png,jpeg,gif',
        'upc' => ['required','unique:products','regex:/[0-9]{12,12}$/'],
        'price' => ['required','regex:/^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/'],
        'stock' => 'required|integer|max:999999',
        //'sort[]' => 'required|integer|max:10|min:1',
         'size' => 'required','regex:/[A-Za-z0-9_]{1,5}/',
       'description' => 'max:500',
        'color_id' => 'required',
        'brand_id' => 'required',
        'idealfor' => 'required',
         'url'=>'unique:products',

    ]);

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
      foreach($request->file('subimage') as $key=>$insert)
      {
        // $imageName = time().'-'.$insert->getClientoriginalName();
         $imageName =$request->upc.'_'.$insert->getClientoriginalName();
         $insert->storeAs('/public/media' ,$imageName);
         $save_sub_image=[
            'product_id'=>$product->id,
             'images' => $imageName,
             'sort' =>$request->sort[$key],
         ];
         DB::table('productimages')->insert($save_sub_image);
      }
    }
    return redirect('/admin/product/addproduct')->with('status','Product Add Successfully');
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
        $brand = Product::join('brands', 'brands.id', '=', 'products.brand_id')
        ->where('products.id',$id)->get(['brands.id as bid', 'brands.name as bname']);
        $colors = DB::table('colors')->select('name as cname','id as cid')->where(['status'=>'Y'])->orderBy('name', 'asc')->get();
        $images=Productimage::where('product_id',$id)->get();
       // dd($images);
         return view('Product::edit',['brands' => $brand],compact(['colors','product','images']));
    }
    public function update(Request $request,$id)
    {
    //     $request->validate(['name'=>'required|max:100',
    //     'image' => 'required|mimes:jpg,png,jpeg,gif',
    //     'subimage[]' => 'required|mimes:jpg,png,jpeg,gif',
    //     'upc' => ['required','unique:products','regex:/[0-9]{12,13}$/'],
    //     'price' => ['required','regex:/^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/'],
    //     'stock' => 'required|integer|max:999999',
    //     'sort[]' => 'required|integer|max:10|min:1',
    //     'size' => 'required|integer|max:3|min:1',
    //     'description' => 'max:500',
    //     'color_id' => 'required',
    //     'category_id' => 'required',
    //      'url'=>'unique:products'

    //    ]);
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

        //for delete record
        if ($request->input('img_id')){
            $img=Productimage::where('product_id',$id)->whereNotIn('id',$request->input('img_id'))->get();
           // dd($img);
            foreach ($img as $item){
               // dd(('/storage/media/').$item->images);
              // File::delete('/public/media/',$item->images);
            //    $del=app_path('storage/media/').$item->images;
            //   dd($del);

              $destinationPath = 'storage/media/';
              File::delete($destinationPath.'/$item->images');
              // @unlink($del);
                $item->delete();
            }
        }
        else{
            $img=Productimage::where('product_id',$id)->get();
           // dd($img);
            foreach ($img as $item){
                //dd('/storage/media/');
                // $del=app_path('storage/media/').$item->images;
                // dd($del);
                $destinationPath = 'storage/media/';
                File::delete($destinationPath.'/$item->images');
                //File::delete('/storage/media/').$item->images;
            //    File::delete('resources/assets/admin/images/products/'.$request->upc.'/'.$item->name);
             //  dd($del);
           //  File::delete('/public/media',$item->images);
             //  @unlink($del);
                $item->delete();
            }
        }

        if($request->hasFile('sub_img'))
        {
            foreach($request->file('sub_img') as $k=>$image)
            {
                if ($request->input('img_id')[$k])
                {

                    if ($request->input('sort')[$k])
                    {

                        Productimage::where('id',$request->input('img_id')[$k])->update(['images'=>$id.'_'.time().'.png','sort'=>$request->input('sort')[$k]]);
                    }
                    else{
                        Productimage::where('id',$request->input('img_id')[$k])->update(['images'=>$id.'_'.time().'.png']);
                    }
                    $image->storeAs('/public/media', $id.'_'.time().'.png');
                }
                else
                {
                    if ($request->input('sort')[$k])
                    {
                        Productimage::create(['product_id'=>$request->id, 'images'=>$id.'_'.time().'.png','sort'=>$request->input('sort')[$k]]);
                    }
                    else {
                        Productimage::create(['product_id'=>$request->id,'images'=>$id.'_'.time().'.png']);
                    }
                    $image->storeAs('/public/media', $id.'_'.time().'.png');
                }
            }
        }
       // Session::flash('deleted_user','The user has been deleted');
      // return back()->with(' Product updated successfully');
       return response()->json(['success'=>'Status change successfully.']);
    }
// chack uniqe name
    public function checkUrl(Request $request)
    {

        $product=Product::where('id','!=',$request->id)->where('name',$request->name)->first();

        if(isset($product))
        {
            return json_encode(false);
        }
        else {
            return json_encode(true);
        }
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

