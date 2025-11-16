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
        $date = $request->get('date', ''); 

        $query = Customer::query();

        if ($date) {
            $query->whereDate('created_at', $date);
        }

    
        $customers = $query->paginate(5);

        return response()->json([
            'customers' => $customers->items(), 
            'current_page' => $customers->currentPage(),
            'last_page' => $customers->lastPage(),
            'total' => $customers->total(),
        ]);
    }

}
