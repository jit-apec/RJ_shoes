<?php

namespace App\Modules\Colors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Colors\Models\colors;
use DB;
use Illuminate\Support\Facades\Auth;
class ColorsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Colors::new");
    }
    public function changeStatus(Request $r)
    {
        $colors = Colors::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success'=>'Status change successfully.']);
    }


    public function getdata(Request $request){

         $colors =new colors;

        $id = Auth::id();
         $colors->name=$request->name;
         $colors->user_id=$id;
         $colors->status=$request->status;
         $colors-> save();
        // return redirect('Colors::welcome');
        $data=colors::all();
    	return view('Colors::welcome',['colors'=>$data]);
       // return redirect("Colors::welcome");

    }
    public function displaycolor()
    {


        $data=colors::all();
    	return view('Colors::welcome',['colors'=>$data]);
    }

    public function edit($id)
    {
        $colors = colors::find($id);
        return view('Colors::edit', compact('colors'));
    }

    public function update(Request $request,$id)
    {
        $id = Auth::id();
        $colors=colors::find($id);
        $colors->user_id=$id;
        $colors->name=$request->name;
        $colors->update();
        return redirect('displaycolor');

       //return redirect($url)->with('success', 'Data saved successfully!');
    }
    // public function delete($id)
    // {
    //     $record= Colors::find($id)->delete();
    //     if ($record)
    // }


}
