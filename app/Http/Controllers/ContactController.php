<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; 
class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'আপনার মেসেজটি সফলভাবে পাঠানো হয়েছে!');
    }
}
