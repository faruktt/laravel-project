<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use App\Models\Roomstatus;

class RoomController extends Controller
{

    public function index(Request $request)
    {
        $typeData = Type::where('status', 'active')->get();
        $satusData = Roomstatus::where('status', 'active')->get();
        $allRoomData = Room::with('type')->get();
        return view('room.index',compact('typeData','satusData','allRoomData'));
    }

    public function create(){

    }

    public function store(Request $request){
        $request->validate([
            'type_id' => 'required',
            'status_id' => 'required',
            'room_no' => 'required',
            'capacity' => 'required',
            'price' => 'required',
            'view' => 'required',
        ]);

        // Prepare the data to save in the database
        $data = [
            'type_id' => $request->input('type_id'),
            'status_id' => $request->input('status_id'),
            'room_no' => $request->input('room_no'),
            'capacity' => $request->input('capacity'),
            'price' => $request->input('price'),
            'view' => $request->input('view'),
            'status' => $request->input('status', '1'), // Default to 'Active' if not provided
        ];


        // Attempt to create the new record
        if (Room::create($data)) {
            return redirect()->back()->with('success', 'Type added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add type.');
        }
    }
}
