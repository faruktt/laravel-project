<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roomstatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roomstatus::create([
            'roomstatus' => 'Do not distrub',
            'status' => '1'
        ]);
        Roomstatus::create([
            'roomstatus' => 'Separate Room',
            'status' => '1'
        ]);
    }
}
