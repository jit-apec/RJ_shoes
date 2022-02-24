<?php

namespace App\Modules\Brand\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Brand\models\Brand;
use Illuminate\Support\Facades\Auth;
class BrandController extends Controller
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
    public function display()
    {
        $branddisp = brand::join('users', 'users.id', '=', 'brands.user_id')->where('status', array('Y'))->orWhere('status', array('N'))
            ->get(['brands.*', 'users.username']);
        return view('Brand::display', ['list' => $branddisp]);
    }
    public function addBrands()
    {
        return view("Brand::addbrand");
    }
    public function adddata(Request $req)
    {
        $req->validate([
            'name' => 'required|alpha|min:3|unique:brands|max:10|regex:/^\S*$/u'
        ]);
        $brand = new Brand();
        $id = Auth::id();
        $brand->name = $req->name;
        $brand->user_id = $id;
        $brand->save();
        return back()->with('status', 'data add successfully');
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
        return back()->with('status', 'Data Update Successfully');
    }
    public function trashlist()
    {
        $branddisp = brand::join('users', 'users.id', '=', 'brands.user_id')->where('status', array('T'))
            ->get(['brands.*', 'users.username']);
        return view('Brand::trashbrand', ['list' => $branddisp]);
    }
    public function movetrash(Request $r)
    {
        $update = brand::find($r->id);
        $update->status = 'T';
        $update->save();
        return brand::all();
    }
    public function restore(Request $r)
    {
        $update = brand::find($r->id);
        $update->status = 'Y';
        $update->save();
        return brand::all();
    }
    public function changestatus(Request $r)
    {
        $brand = new brand();
        $Aid = Auth::id();
        $brand->user_id = $Aid;
        $brand = brand::find($r->id);
        $brand->status = $r->status;
        $brand->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
