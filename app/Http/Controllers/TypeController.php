<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(Request $request){
        $allType = Type::all();
        return view('Type.index',compact('allType'));
    }

    public function create(){

    }

    public function store(Request $request){
    // Validate the incoming request
    $request->validate([
        'type' => 'required',
    ]);

    // Prepare the data to save in the database
    $data = [
        'type' => $request->input('type'),
        'status' => $request->input('status', 'Active'), // Default to 'Active' if not provided
    ];

    // Attempt to create the new record
    if (Type::create($data)) {
        return redirect()->back()->with('success', 'Type added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add type.');
    }
}


}
