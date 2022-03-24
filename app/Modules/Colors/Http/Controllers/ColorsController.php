<?php

namespace App\Modules\Colors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Colors\Models\colors;
use Illuminate\Support\Facades\Auth;

class ColorsController extends Controller
{
    /**
     * Display the module display screen
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Colors::add");
    }
    public function display()
    {
        $users = Colors::join('users', 'users.id', '=', 'colors.user_id')->where('status', array('Y'))->orWhere('status', array('N'))
            ->get(['colors.*', 'users.username']);
        return view('Colors::display', ['colors' => $users]);
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|min:3|unique:colors|max:10|regex:/^\S*$/u'
        ]);
        $colors = new colors;

        $id = Auth::id();
        $colors->name = $request->name;
        $colors->user_id = $id;
        $colors->save();
        return back()->with('status', 'data add successfully');
    }
    public function edit($id)
    {
        $colors = colors::find($id);
        return view('Colors::edit', compact('colors'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|alpha|min:3|max:10|regex:/^\S*$/u|unique:colors,name,' . $id,
        ]);
        $Aid = Auth::id();
        $colors = colors::find($id);
        $colors->user_id = $Aid;
        $colors->name = $request->name;
        $colors->update();
        return back()->with('status', 'Data Update Successfully');
    }
    public function trash()
    {
        $colors = Colors::join('users', 'users.id', '=', 'colors.user_id')->where('status', array('T'))->get(['colors.*', 'users.username']);
        return view('Colors::trash', ['colors' => $colors]);
    }
    public function delete(Request $r)
    {
        $update = Colors::find($r->id);
        $update->status = 'T';
        $update->save();
        return Colors::all();
    }
    public function restore(Request $r)
    {
        $update = Colors::find($r->id);
        $update->status = 'Y';
        $update->save();
        return colors::all();
    }
    public function changeStatus(Request $r)
    {
        $colors = new colors;
        $id = Auth::id();
        $colors->user_id = $id;
        $colors = Colors::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function checkUrl(Request $request)
    {
        $colors = Colors::where('id', '!=', $request->id)->where('name', $request->name)->first();
        if (isset($colors)) {
            return json_encode(false);
        } else {
            return json_encode(true);
        }
    }
}
