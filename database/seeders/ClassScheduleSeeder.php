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
                'day' => 'Tuesday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 1,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],
            [
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'schedule_name' => 'Midweek Lecture',
                'class_id' => 2,
                'class_mode_id' => 1,
                'room_id' => 3,
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 3,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],
            [
                'day' => 'Thursday',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'schedule_name' => 'Midweek Lecture',
                'class_id' => 4,
                'class_mode_id' => 2,
                'room_id' => 3,
            ],
            [
                'day' => 'Thursday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 5,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],
            [
                'day' => 'Saturday',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'schedule_name' => 'Midweek Lecture',
                'class_id' => 6,
                'class_mode_id' => 2,
                'room_id' => 3,
            ],
            [
                'day' => 'Monday',
                'start_time' => '16:00:00',
                'end_time' => '19:00:00',
                'schedule_name' => 'Morning Lecture',
                'class_id' => 7,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],

            // Operating System (Lec)
            [
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 8,
                'class_mode_id' => 2,
                'room_id' => 1,
            ],

            // Operating System (Lab)
            [
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 9,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],
            
            // Intelligent System (Lec) 
            [
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 10,
                'class_mode_id' => 1,
                'room_id' => 1,
            ],

            // Intelligent System (Lab)
            [
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'schedule_name' => 'Afternoon Lecture',
                'class_id' => 11,
                'class_mode_id' => 2,
                'room_id' => 1,
            ],            
            // [
            //     'day' => 'Wednesday',
            //     'start_time' => '16:00:00',
            //     'end_time' => '19:00:00',
            //     'schedule_name' => 'Midweek Lecture',
            //     'class_id' => 6,
            //     'class_mode_id' => 2,
            //     'room_id' => 3,
            // ],
            // [
            //     'day' => 'Monday',
            //     'start_time' => '13:00:00',
            //     'end_time' => '16:00:00',
            //     'schedule_name' => 'Morning Lecture',
            //     'class_id' => 1,
            //     'class_mode_id' => 1,
            //     'room_id' => 1,
            // ],
            // [
            //     'day' => 'Thursday',
            //     'start_time' => '16:00:00',
            //     'end_time' => '19:00:00',
            //     'schedule_name' => 'Midweek Lecture',
            //     'class_id' => 7,
            //     'class_mode_id' => 2,
            //     'room_id' => 3,
            // ],
            // [
            //     'day' => 'Thursday',
            //     'start_time' => '13:00:00',
            //     'end_time' => '16:00:00',
            //     'schedule_name' => 'Morning Lecture',
            //     'class_id' => 1,
            //     'class_mode_id' => 1,
            //     'room_id' => 1,
            // ],
            // [
            //     'day' => 'Wednesday',
            //     'start_time' => '13:00:00',
            //     'end_time' => '16:00:00',
            //     'schedule_name' => 'Midweek Lecture',
            //     'class_id' => 7,
            //     'class_mode_id' => 2,
            //     'room_id' => 3,
            // ],
            // [
            //     'day' => 'Tuesday',
            //     'start_time' => '13:00:00',
            //     'end_time' => '16:00:00',
            //     'schedule_name' => 'Morning Lecture',
            //     'class_id' => 1,
            //     'class_mode_id' => 1,
            //     'room_id' => 1,
            // ],
            // [
            //     'day' => 'Tuesday',
            //     'start_time' => '13:00:00',
            //     'end_time' => '16:00:00',
            //     'schedule_name' => 'Midweek Lecture',
            //     'class_id' => 7,
            //     'class_mode_id' => 2,
            //     'room_id' => 3,
            // ],
        ];

        foreach ($schedules as $schedule) {
            ClassSchedule::create($schedule);
        }
    }
}
