<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'type_id',
        'status_id',
        'room_no',
        'capacity',
        'price',
        'view',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function roomStatus()
    {
        return $this->belongsTo(Roomstatus::class, 'status_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
