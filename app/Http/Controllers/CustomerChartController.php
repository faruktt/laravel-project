<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerChartController extends Controller
{
    public function getChartData()
    {
       return view('dashboard');
    }

    public function getCustomerList(Request $request)
    {
        $query = Customer::select('name', 'email', 'created_at');

        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }

        $customers = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'customers' => $customers->map(function ($customer) {
                return [
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'date' => $customer->created_at->format('Y-m-d')
                ];
            })
        ]);
    }
}
