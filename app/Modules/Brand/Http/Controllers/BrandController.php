<?php

namespace App\Modules\Brand\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Brand\models\Brand;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
{
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        $branddisp = brand::join('users', 'users.id', '=', 'brands.user_id')->where('status', array('Y'))->orWhere('status', array('N'))
            ->get(['brands.*', 'users.username']);
        return view('Brand::display', ['list' => $branddisp]);
    }
    public function create()
    {
        return view("Brand::addbrand");
    }
    public function add(Request $req)
    {
        $req->validate([
            'name' => 'required|alpha|min:3|unique:brands|max:10|regex:/^\S*$/u'
        ]);
        $brand = new Brand();
        $id = Auth::id();
        $brand->name = $req->name;
        $brand->user_id = $id;
        $brand->save();
        return redirect('/admin/brand/add')->with('status', 'data add successfully');
    }
    public function edit($id)
    {
        $brand = brand::find($id);
        return view('Brand::editbrand', compact('brand'));
    }
    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|alpha|min:3|max:10|regex:/^\S*$/u|unique:brands,name,' . $id,
        ]);
        $Aid = Auth::id();
        $brand = brand::find($id);
        $brand->user_id = $Aid;
        $brand->name = $req->name;
        $brand->update();
        return back()->with('status', 'Order Status updated Update Successfully');
    }
    public function trash()
    {
        $branddisp = brand::join('users', 'users.id', '=', 'brands.user_id')->where('status', array('T')) ->get(['brands.*', 'users.username']);
        return view('Brand::trashbrand', ['list' => $branddisp]);
    }
    public function delete(Request $r)
    {
        brand::where('id',$r->id)->update(['status'=>'T']);
        return response()->json(['status'=>'Brand move to trash successfully!!']);
    }
    public function restore(Request $r)
    {
      brand::where('id',$r->id)->update(['status'=>'Y']);
      return response()->json(['status'=>'Brand restored successfully']);
    }
    public function destroye(Request $request){
        brand::where('id',$request->id)->delete();
        return response()->json(['status'=>'Brand delete successfully']);
    }
    public function changestatus(Request $r)
    {
        brand::where('id',$r->id)->update(['status'=>$r->status,'user_id'=>Auth::id()]);
        return response()->json(['success' => 'Status change successfully.']);
    }
    public function checkUrl(Request $request)
    {
        $brand = brand::where('id', '!=', $request->id)->where('name', $request->name)->first();
        if (isset($brand)) {
            return json_encode(false);
        } else {
            return json_encode(true);
        }
    }
}
