<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $schedules = [
            [
                'day' => 'Monday',
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
                'schedule_name' => 'Morning Lecture',
                'class_id' => 1,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'schedule_name' => 'Midweek Lecture',
                'class_id' => 2,
                'class_mode_id' => 2,
                'room_id' => 3,
            ],
        ];

        foreach ($schedules as $schedule) {
            ClassSchedule::create($schedule);
        }
    }
}
