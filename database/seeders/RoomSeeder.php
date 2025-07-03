<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'type_id' => '1',
            'status_id' => '1',
            'room_no' => 'A1',
            'capacity' => '2',
            'price' => '500',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '2',
            'status_id' => '2',
            'room_no' => 'B2',
            'capacity' => '4',
            'price' => '1500',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '1',
            'status_id' => '2',
            'room_no' => 'C1',
            'capacity' => '3',
            'price' => '1000',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '2',
            'status_id' => '2',
            'room_no' => 'C2',
            'capacity' => '4',
            'price' => '1500',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '1',
            'status_id' => '1',
            'room_no' => 'D1',
            'capacity' => '5',
            'price' => '2000',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '2',
            'status_id' => '1',
            'room_no' => 'D2',
            'capacity' => '2',
            'price' => '1000',
            'view' => 'See River',
            'status' => '1'

        ]);
        Room::create([
            'type_id' => '1',
            'status_id' => '2',
            'room_no' => 'E1',
            'capacity' => '3',
            'price' => '1000',
            'view' => 'See River',
            'status' => '1'

        ]);
    }
}
