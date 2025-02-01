<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'job', 'address', 'persons',
        'from_date', 'until_date', 
        'total_price', 'payment', 'insufficient_balance', 'status'
    ];

}
