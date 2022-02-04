<?php

namespace App\Modules\Colors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Colors\Models\colors;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Modules\Colors\Http\Controllers\Input;
class ColorsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view("Colors::add");
    }
    public function displaycolor()
    {
        // $users = Colors::where('status',array('Y'))-> orWhere('status',array('N'))
        // ->get();

        $users = Colors::join('users', 'users.id', '=', 'colors.user_id')->where('status',array('Y'))-> orWhere('status',array('N'))
               ->get(['colors.*', 'users.username']);
               return view('Colors::welcome',['colors'=>$users]);
         //$users = User::join('posts', 'users.id', '=', 'posts.user_id')
            //   ->get(['users.*', 'posts.descrption']);

       // $sql=colors::select users.name as name,colors.*  from colors join users on users.id=colors.user_id;
       // $data=colors::all();
       // return compact('users');
    }
    //add data
    public function getdata(Request $request){

        $request->validate(['name'=>'required|alpha|min:3|unique:colors|max:10|regex:/^\S*$/u'
     ]);
        $colors =new colors;

       $id = Auth::id();
        $colors->name=$request->name;
        $colors->user_id=$id;
        $colors-> save();
         return back()->with('status', 'data add successfully');
      //  return redirect('/admin/color/displaycolor');
       // return redirect('Colors::welcome');
      // $data=colors::all();
       // $data = Colors::where('status',array('N','Y'))->get();
       // return view('Colors::welcome',['colors'=>$data]);


      // return redirect("Colors::welcome");

   }
//edit colors
   public function edit($id)
   {
       $colors = colors::find($id);
       return view('Colors::edit', compact('colors'));
   }
//upadte color
   public function update(Request $request,$id)
   {
    $request->validate(['name'=>'required|alpha|min:3|max:10|regex:/^\S*$/u'
]);
       $Aid = Auth::id();
       $colors=colors::find($id);
       $colors->user_id=$Aid;
       $colors->name=$request->name;
       $colors->update();
       //return redirect('/admin/color/displaycolor');
       return back()->with('status', 'Data Update Successfully');
      //return redirect($url)->with('success', 'Data saved successfully!');
   }
///change color status
    public function changeStatus(Request $r)
    {
        $colors = new colors;
        $id = Auth::id();
        $colors->user_id=$id;
        $colors = Colors::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
    // public function trash(){
    //     return view("Colors::trash");
    // }
    //display trash list
    public function trashshow(){
        $colors = Colors::join('users', 'users.id', '=', 'colors.user_id')->where('status',array('T'))->get(['colors.*', 'users.username']);
        // $colors = Colors::where('status',array('T'))->get();
        return view('Colors::trash',['colors'=>$colors]);
    }
//update status T
    public function movetotrash(Request $r)
    {
         $update = Colors::find($r->id);
        // dd($update);
        $update->status='T';
        $update->save();
        return Colors::all();
}

    // restore
    public function restore(Request $r)
    {
        $update = Colors::find($r->id);
        $update->status='Y';
        $update->save();
        return colors::all();
    }


    //  public function displaydata()
    //  {
    //     $data = Colors::where('status',array('Y'))-> orWhere('status',array('N'))->get();
    //     return view('Colors::welcome',['colors'=>$data]);
    //     //return compact('data');

    //  }
    // public function delete($id)
    // {
    //     $record= Colors::find($id)->delete();
    //     if ($record)
    // }

    public function check_availability(Request $r){

    //  Colors::where('name',array($r->name));
    //    return  Colors::all();

       if (Colors::where('name', '=', Colors::get('name'))->exists()) {
        return response()->json(['success'=>'available']);
      }
      else
      {
        return response()->json(['success'=>'hi']);
      }

    }

}
