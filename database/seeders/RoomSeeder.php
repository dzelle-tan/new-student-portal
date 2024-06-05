<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['room_number' => 101, 'room_name' => 'Lecture Room 101', 'building_id' => 1],
            ['room_number' => 102, 'room_name' => 'Lecture Room 102', 'building_id' => 1],
            ['room_number' => 201, 'room_name' => 'Laboratory 201', 'building_id' => 2],
            ['room_number' => 202, 'room_name' => 'Laboratory 202', 'building_id' => 2],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
