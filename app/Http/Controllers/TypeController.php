<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(Request $request){
        $allType = Type::paginate(5);
        return view('Type.index',compact('allType'));
    }

    public function create(){

    }

    public function store(Request $request){

    $request->validate([
        'type' => 'required',
    ]);


    $data = [
        'type' => $request->input('type'),
        'status' => $request->input('status', 'Active'),
    ];


    if (Type::create($data)) {
        return redirect()->back()->with('success', 'Type added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add type.');
    }
}


public function activate($id)
{
    $type = Type::find($id);
    $type->status = 1;  
    $type->save();

    return redirect()->route('type.index')->with('success', 'type Activated');
}

public function deactivate($id)
{
    $type = Type::find($id);
    $type->status = 0;
    $type->save();

    return redirect()->route('type.index')->with('success', 'type Deactivated');
}


}
