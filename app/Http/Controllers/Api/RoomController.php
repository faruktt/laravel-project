<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(
            Room::with(['type'])->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'status_id' => 'required',
            'room_no' => 'required',
            'price' => 'required'
        ]);

        $room = Room::create($request->all());

        return response()->json([
            'status' => true,
            'data' => $room
        ]);
    }

    public function show($id)
    {
        return response()->json(
            Room::with(['type'])->findOrFail($id)
        );
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());

        return response()->json($room);
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
