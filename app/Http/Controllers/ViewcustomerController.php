<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class ViewcustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('viewCustomer.index',compact('customers'));
    }
}
