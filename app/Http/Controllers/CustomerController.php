<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Customer;
use Carbon\Carbon;


use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request) {

        $rooms = Room::where('status', 1)->orderBy('capacity', 'asc')->get();

        return view('Customer.index',compact('rooms'));
    }





// public function create(){

// }

public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'job' => 'required|string',
        'address' => 'required|string',
        'persons' => 'required|numeric',
        'from_date' => 'required|date',
        'until_date' => 'required|date',
        'room_id' => 'required|exists:rooms,id',
        'total_price' => 'required|string',
        'payment' => 'required|numeric',
        'insufficient_balance' => 'required|string',
    ]);

    // Remove ' BDT' from the total_price and insufficient_balance
    $totalPrice = str_replace(' BDT', '', $request->total_price);
    $insufficientBalance = str_replace(' BDT', '', $request->insufficient_balance);

    // Ensure the values are numeric
    if (!is_numeric($totalPrice) || !is_numeric($insufficientBalance)) {
        return back()->withErrors('Total Price and Insufficient Balance must be numeric.');
    }
    $status = $request->insufficient_balance == 0 ? 'confirmed' : 'pending';
    // Create a new customer record
    $customer = new Customer;
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->phone = $request->phone;
    $customer->job = $request->job;
    $customer->address = $request->address;
    $customer->persons = $request->persons;
    $customer->from_date = $request->from_date;
    $customer->until_date = $request->until_date;
    $customer->room_id = $request->room_id;
    $customer->total_price = $totalPrice; // Store numeric value only
    $customer->payment = $request->payment;
    $customer->insufficient_balance = $insufficientBalance;
    $customer->status = $status;

    // Save the customer to the database
    $customer->save();

    // Optionally, redirect the user to a success page or show a success message
    return redirect()->route('customer.index'); // Replace with your route
}





}
