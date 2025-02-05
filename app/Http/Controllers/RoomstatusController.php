<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roomstatus;

class RoomstatusController extends Controller
{
    public function index(){
        $statusData = Roomstatus::paginate(5);
        return view('RoomStatus.index',compact('statusData'));
    }

    public function create(){

    }

    public function store(Request $request){
    // Validate the incoming request
    $request->validate([
        'roomstatus' => 'required',
    ]);

    // Prepare the data to save in the database
    $data = [
        'roomstatus' => $request->input('roomstatus'),
        'status' => $request->input('status', 'Active'), // Default to 'Active' if not provided
    ];

    // Attempt to create the new record
    if (Roomstatus::create($data)) {
        return redirect()->back()->with('success', 'Type added successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to add type.');
    }
}

public function activate($id)
{
    $roomstatus = Roomstatus::find($id);
    $roomstatus->status = 1;  // Change status to active
    $roomstatus->save();

    return redirect()->route('roomstatus.index')->with('success', 'roomstatus Activated');
}

public function deactivate($id)
{
    $roomstatus = Roomstatus::find($id);
    $roomstatus->status = 0;  // Change status to inactive
    $roomstatus->save();

    return redirect()->route('roomstatus.index')->with('success', 'roomstatus Deactivated');
}
}
