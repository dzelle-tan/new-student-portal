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
        $grades = [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75];
        $remarksOptions = ['Passed']; // 'Failed', 'INC'

        $data = [];

        // Generating grades for classes 1 to 47 for multiple students
        for ($classId = 1; $classId <= 11; $classId++) {
            $remarks = $remarksOptions[array_rand($remarksOptions)];
            $grade = $grades[array_rand($grades)];
            $completionGrade = $grades[array_rand($grades)];

            $data[] = [
                'remarks' => $remarks,
                'grade' => $grade,
                'completion_grade' => $completionGrade,
                'submitted_date' => now(),
                'finalization_date' => now(),
                'class_id' => $classId,
                'student_no' => 202310001,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        foreach ($data as $grade) {
            Grade::create($grade);
        }
    }
}
