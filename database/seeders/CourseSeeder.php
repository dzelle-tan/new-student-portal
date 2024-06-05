<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'subject_code' => 'CS101',
                'subject_title' => 'Introduction to Computer Science',
                'course_number' => '101',
                'units' => 3,
                'class_code' => 101,
                'pre_requisite' => '',
                'program_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'subject_code' => 'CS102',
                'subject_title' => 'Data Structures',
                'course_number' => '102',
                'units' => 4,
                'class_code' => 102,
                'pre_requisite' => 'CS101',
                'program_id' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
