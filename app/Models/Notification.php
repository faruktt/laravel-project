<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',  // ✅ এখানে `user_id` যোগ করুন
        'message',
        'link',
        'status', // যদি `read` ফিল্ড থাকে, তাহলে এটাও যোগ করুন
    ];
}
