<?php

namespace App\Modules\Product\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modules\Brand\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Modules\Colors\Models\Colors;
use App\Modules\Product\Models\product;
use App\Modules\Product\Models\Productimage;
use App\Modules\Frontend\Http\Controllers\FrontendController;

class ProductController extends Controller
{
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $colors = Colors::select('name as cname', 'id as cid')->where(['status' => 'Y'])->get();
        $brand =  Brand::select('name as bname', 'id as bid')->where(['status' => 'Y'])->get();
        return view('Product::addproduct', ['colors' => $colors, 'brands' => $brand]);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif',
            'upc' => ['required', 'unique:products', 'regex:/[0-9]{12,12}$/'],
            'price' => ['required', 'regex:/^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/'],
            'stock' => 'required|integer|max:999999',
            'size' => 'required', 'regex:/[A-Za-z0-9_]{1,5}/',
            'description' => 'max:500',
            'color_id' => 'required',
            'brand_id' => 'required',
            'idealfor' => 'required',
            'url' => 'unique:products|required',
        ]);

        $product = new Product;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $product->image = $image_name;
        }
        $product->name = $request->name;
        $product->idealfor = $request->idealfor;
        $product->upc = $request->upc;
        $product->url = $request->url;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->discription;
        $product->color_id = $request->color_id;
        $product->brand_id = $request->brand_id;
        $uid = Auth::user()->id;
        $product->user_id = $uid;
        $product->save();
        if ($request->hasFile('subimage')) {
            foreach ($request->file('subimage') as $key => $insert) {
                $imageName = $request->upc . '_' . $insert->getClientoriginalName();
                $insert->storeAs('/public/media', $imageName);
                $save_sub_image = [
                    'product_id' => $product->id,
                    'images' => $imageName,
                    'sort' => $request->sort[$key],
                ];
                DB::table('productimages')->insert($save_sub_image);
            }
        }
        return redirect('/admin/product/addproduct')->with('status', 'Product Add Successfully');
    }
    public function display()
    {
        $Product = Product::Join('colors', 'colors.id', '=', 'products.color_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.status', array('Y'))
            ->orWhere('products.status', array('N'))
            ->get(['products.*', 'colors.name as cname', 'brands.name as bname']);
        return view("Product::display", ['products' => $Product]);
    }
    public function trash()
    {
        $Product = Product::join('colors', 'colors.id', '=', 'products.color_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.status', array('T'))
            ->get(['products.*', 'colors.name as cname', 'brands.name as bname']);
        return view("Product::trash", ['product' => $Product]);
    }
    public function changestatus(Request $r)
    {
        Product::where('id',$r->id)->update(['status'=>$r->status]);
        return response()->json(['success' => 'Status change successfully.']);
    }
    public function delete(Request $r)
    {
        Product::where('id', $r->id)->update(['status' => 'T']);
        return response()->json(['status'=>'product delete successfully!!']);
    }

    public function restore(Request $r)
    {
        Product::where('id', $r->id)->update(['status'=>'Y']);
        return response()->json(['status'=>'product restore successfully!!']);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $brand = Product::join('brands', 'brands.id', '=', 'products.brand_id')
            ->where('products.id', $id)->get(['brands.id as bid', 'brands.name as bname']);
        $colors = Colors::select('name as cname', 'id as cid')->where(['status' => 'Y'])->orderBy('name', 'asc')->get();
        $images = Productimage::where('product_id', $id)->get();
        return view('Product::edit', ['brands' => $brand], compact(['colors', 'product', 'images']));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif',
            'price' => ['required', 'regex:/^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/'],
            'stock' => 'required|integer|max:999999',
            'size' => 'required', 'regex:/[A-Za-z0-9_]{1,5}/',
            'description' => 'max:1000',
            'color_id' => 'required',
            'idealfor' => 'required',
            'url' => 'required',
        ]);
        $Aid = Auth::id();
        $data = [

            'name' => $request->name,
            'idealfor' => $request->idealfor,
            'url' => $request->url,
            'size' => $request->size,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'color_id' => $request->color_id,
            'user_id' => $Aid,
        ];
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media', $image_name);
            $data['image'] = "$image_name";
        }
        Product::where('id', $id)->update($data);

        if ($request->input('img_id')) {
            $img = Productimage::where('product_id', $id)->whereNotIn('id', $request->input('img_id'))->get();
            foreach ($img as $item) {
                $destinationPath = 'storage/media/';
                File::delete($destinationPath . '/$item->images');
                $item->delete();
            }
        } else {
            $img = Productimage::where('product_id', $id)->get();
            foreach ($img as $item) {
                $destinationPath = 'storage/media/';
                File::delete($destinationPath . '/$item->images');
                $item->delete();
            }
        }

        if ($request->hasFile('sub_img')) {
            foreach ($request->file('sub_img') as $k => $image) {
                if ($request->input('img_id')[$k]) {
                    if ($request->input('sort')[$k]) {
                        Productimage::where('id', $request->input('img_id')[$k])->update(['images' => $id . '_' . time() . '.png', 'sort' => $request->input('sort')[$k]]);
                    } else {
                        Productimage::where('id', $request->input('img_id')[$k])->update(['images' => $id . '_' . time() . '.png']);
                    }
                    $image->storeAs('/public/media', $id . '_' . time() . '.png');
                } else {
                    if ($request->input('sort')[$k]) {
                        Productimage::create(['product_id' => $request->id, 'images' => $id . '_' . time() . '.png', 'sort' => $request->input('sort')[$k]]);
                    } else {
                        Productimage::create(['product_id' => $request->id, 'images' => $id . '_' . time() . '.png']);
                    }
                    $image->storeAs('/public/media', $id . '_' . time() . '.png');
                }
            }
        }
        return back()->with('status', 'Product Update Successfully');
    }
    // chack uniqe name
    public function checkUrl(Request $request)
    {
        $product = Product::where('id', '!=', $request->id)->where('name', $request->name)->first();
        if (isset($product)) {
            return json_encode(false);
        } else {
            return json_encode(true);
        }
    }

    public function product_view()
    {
        dd("hello");
        $product_view=new FrontendController();
      //  $product_view->view($url);
    }
}
