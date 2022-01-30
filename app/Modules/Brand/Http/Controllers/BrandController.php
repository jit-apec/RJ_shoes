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
    public function welcome()
    {
        return view("Brand::welcome");
    }
    //to display record
    public function display()
    {
      $branddisp=brand::join('users','users.id','=','brands.user_id')->where('status',array('Y'))-> orWhere('status',array('N'))
        ->get(['brands.*', 'users.username']);
        return view('Brand::display',['list'=>$branddisp]);
    }
    //to display add form
    public function addBrands(){
        return view("Brand::addbrand");
    }
    //to add data
    public function adddata(Request $req){
        $brand = new Brand();
        $id=Auth::id();
        $brand->name=$req->name;
        $brand->user_id=$id;
        $brand->status=$req->status;
        $brand->save();
        return redirect('display');
    }
    //get record in edit page
    public function edit($id) {
        $brand=brand::find($id);
        return view('Brand::editbrand',compact('brand'));
    }
    //update Brand record
    public function update(Request $req, $id) {
        $Aid=Auth::id();
        $brand=brand::find($id);
        $brand->user_id=$Aid;
        $brand->name=$req->name;
        $brand->update();
        return redirect('display');
    }
    //display trash record
    public function trashlist() {
        $branddisp=brand::join('users','users.id','=','brands.user_id')->where('status',array('T'))
        ->get(['brands.*', 'users.username']);
        return view('Brand::trashbrand',['list'=>$branddisp]);
    }
    //move record trash
    public function movetrash(Request $r)
    {
        $update= brand::find($r->id);
        $update->status='T';
        $update->save();
        return brand::all();
    }
    //retore trash records
    public function restore(Request $r)
    {
        $update= brand::find($r->id);
        $update->status='Y';
        $update->save();
        return brand::all();
    }
    //change brand stuatus
    public function changestatus(Request $r)
    {
        $brand = new brand();
        $Aid=Auth::id();
        $brand->user_id=$Aid;
        $brand=brand::find($r->id);
        $brand->status=$r->status;
        $brand->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
