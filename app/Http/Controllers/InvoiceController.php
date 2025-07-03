<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Notification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $from = Carbon::parse($customer->from_date);
        $until = Carbon::parse($customer->until_date);
        $customer->days = $from->diffInDays($until);
        return view('invoice.show', compact('customer'));
    }

    public function getUnreadCount()
    {
        $unreadCount = Notification::where('user_id', auth()->id())->where('is_read', false)->count();

        return response()->json(['unread_count' => $unreadCount]);
    }

    public function showNotifications()
        {
            $notifications = Notification::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();


            Notification::where('user_id', auth()->id())->update(['is_read' => true]);

            return response()->json(['notifications' => $notifications]);
        }

        public function markAsRead()
        {
            Notification::where('user_id', auth()->id())->where('is_read', false)->update(['is_read' => true]);

            return response()->json(['success' => true]);
        }

        public function deleteNotification($id)
        {
            Notification::where('id', $id)->where('user_id', Auth::id())->delete();
            return response()->json(['message' => 'Notification deleted successfully']);
        }


}
