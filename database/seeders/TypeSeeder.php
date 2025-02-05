<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type; // ✅ Type মডেল ইমপোর্ট করা হলো

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'type' => 'Single Room',
            'status' => '1'
        ]);

        Type::create([
            'type' => 'Double Room',
            'status' => '1'
        ]);
        Type::create([
            'type' => 'Triple Room',
            'status' => '1'
        ]);
       
    }
}
