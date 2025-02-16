<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data'   => Room::with(['type', 'roomStatus'])->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id'   => 'required|integer',
            'status_id' => 'required|integer',
            'room_no'   => 'required',
            'capacity'  => 'nullable|integer',
            'price'     => 'required|numeric',
            'view'      => 'nullable|string',
            'status'    => 'nullable|integer',
        ]);

        $room = Room::create($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Room created successfully',
            'data'    => $room->load(['type', 'roomStatus'])
        ], 201);
    }

    public function show($id)
    {
        $room = Room::with(['type', 'roomStatus'])->findOrFail($id);

        return response()->json([
            'status' => true,
            'data'   => $room
        ]);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        
        $validated = $request->validate([
            'type_id'   => 'sometimes|required|integer',
            'status_id' => 'sometimes|required|integer',
            'room_no'   => 'sometimes|required',
            'capacity'  => 'nullable|integer',
            'price'     => 'sometimes|required|numeric',
            'view'      => 'nullable|string',
            'status'    => 'nullable|integer',
        ]);

        $room->update($validated);

        return response()->json([
            'status'  => true,
            'message' => 'Room updated successfully',
            'data'    => $room->fresh(['type', 'roomStatus'])
        ]);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Room deleted successfully'
        ]);
    }
}
