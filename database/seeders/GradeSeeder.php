<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'remarks' => 'Passed',
                'grade' => 1.00,
                'completion_grade' => null,
                'submitted_date' => now(),
                'finalization_date' => now(),
                'class_id' => 1,
                'student_no' => 202310001,
            ],
            [
                'remarks' => 'Failed',
                'grade' => 5.00,
                'completion_grade' => null,
                'submitted_date' => now(),
                'finalization_date' => now(),
                'class_id' => 2,
                'student_no' => 202310001,
            ],
            [
                'remarks' => 'INC',
                'grade' => null,
                'completion_grade' => 2.00,
                'submitted_date' => now(),
                'finalization_date' => now(),
                'class_id' => 1,
                'student_no' => 202310001,
            ],
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
