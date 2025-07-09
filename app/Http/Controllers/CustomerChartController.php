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
    public function getCustomerData()
    {
       
        $data = Customer::selectRaw('DATE(created_at) as date,
                                    COUNT(id) as total_customers,
                                    SUM(total_price) as total_price,
                                    SUM(payment) as total_payment,
                                    SUM(insufficient_balance) as insufficient_balance')
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get();

        return response()->json($data);
    }

    public function getCustomerList(Request $request)
    {
        $date = $request->get('date', ''); // Get the date from the request (empty by default)

        $query = Customer::query();

        if ($date) {
            $query->whereDate('created_at', $date); // Filter customers by the given date
        }

        // Paginate results (5 customers per page)
        $customers = $query->paginate(5);

        return response()->json([
            'customers' => $customers->items(),  // Get the items for the current page
            'current_page' => $customers->currentPage(),
            'last_page' => $customers->lastPage(),
            'total' => $customers->total(),
        ]);
    }

}
