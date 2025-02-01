<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['type', 'status'];
    public function rooms()
{
    return $this->hasMany(Room::class);
}


}
