<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Customer;
use Carbon\Carbon;


use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request) {

        return view('Customer.index');
    }





// public function create(){

// }

public function store(Request $request)
{
    $roomId = $request->input('room_id');
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'job' => 'nullable|string|max:255',
        'address' => 'required|string|max:255',
        'persons' => 'required|integer|min:1',
        'from_date' => 'required|date|after_or_equal:today',
        'until_date' => 'required|date|after:from_date',

        'payment' => 'required|numeric|min:0',

    ]);



    // Get room details
    $room = Room::findOrFail($request->room_id);

    // Calculate number of days
    $fromDate = Carbon::parse($request->from_date);
    $untilDate = Carbon::parse($request->until_date);
    $days = $fromDate->diffInDays($untilDate);

    // Calculate total price
    $totalPrice = $days * $room->price;
    $balance = $totalPrice - $request->payment;

    // Determine if there is insufficient balance
    $insufficientBalance = $balance > 0 ? $balance : 0;

    // // Store booking in database
    $booking = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'job' => $request->job,
        'address' => $request->address,
        'persons' => $request->persons,
        'from_date' => $request->from_date,
        'until_date' => $request->until_date,
        'room_id' => $request->room_id,
        'total_price' => $totalPrice,
        'payment' => $request->payment,
        'balance' => $balance,
        'insufficient_balance' => $insufficientBalance,
        'status' => $balance <= 0 ? 'confirmed' : 'pending',

    ]);
    $dd($booking);


    // Redirect to confirmation page
    return back();
}

public function filterRooms(Request $request)
{
    $persons = $request->input('persons');
    $rooms = Room::where('capacity', '>=', $persons)->orderBy('capacity', 'asc')->get();
    return response()->json($rooms);
}


}
