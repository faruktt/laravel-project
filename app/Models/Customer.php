<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'job', 'address', 'persons',
        'from_date', 'until_date', 'room_id',
        'total_price', 'payment', 'insufficient_balance', 'status'
    ];

    
    public function Roomname()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

}
