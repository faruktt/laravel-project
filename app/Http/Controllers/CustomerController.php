<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Notification;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        $query = Customer::query();


        if ($request->has('phone')) {
            $query->where('phone', 'like', '%' . $request->input('phone') . '%');
        }


        $customers = $query->paginate(6);

        
        $allCustomer = Customer::count();

        // ভিউতে ডেটা পাঠানো
        return view('Customer.index', compact('customers', 'allCustomer'));
    }

    public function create(){
        $bookedRooms = Customer::where('until_date', '>=', now())
                        ->get(['room_id', 'until_date'])
                        ->keyBy('room_id');

        $rooms = Room::where('status', 1)->orderBy('capacity', 'asc')->get();

        return view('Customer.create', compact('rooms', 'bookedRooms'));
    }

    public function store(Request $request)
    {
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

        $totalPrice = str_replace(' BDT', '', $request->total_price);
        $insufficientBalance = str_replace(' BDT', '', $request->insufficient_balance);

        if (!is_numeric($totalPrice) || !is_numeric($insufficientBalance)) {
            return back()->withErrors('Total Price and Insufficient Balance must be numeric.');
        }

        $status = $insufficientBalance == 0 ? 'confirmed' : 'pending';

        $customer = Customer::create([
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
            'insufficient_balance' => $insufficientBalance,
            'status' => $status,
        ]);

        $paymentTime = now()->setTimezone('Asia/Dhaka')->format('h:i A');
        Notification::create([
            'user_id' => auth()->check() ? auth()->id() : null, // If user is logged in, use their ID
            'message' => $customer->name . '-Payment Success-' . $paymentTime,  // Show the time the payment was made
            'link' => route('invoice.show', ['id' => $customer->id]),
        ]);


        return redirect()->route('customer.index')->with('success', 'Customer added successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.payment', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'payment' => 'required|numeric|min:0',
        ]);

        $customer->insufficient_balance -= $request->payment;
        if ($customer->insufficient_balance < 0) {
            $customer->insufficient_balance = 0;
        }

        $customer->payment += $request->payment; // Update total payment
        $customer->save();
        $paymentTime = now()->setTimezone('Asia/Dhaka')->format('h:i A');
        Notification::create([
            'user_id' => auth()->check() ? auth()->id() : null, // If user is logged in, use their ID
            'message' => $customer->name . '-Payment Success-' . $paymentTime,  // Show the time the payment was made
            'link' => route('invoice.show', ['id' => $customer->id]),
        ]);

        return redirect()->route('customer.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }
}
