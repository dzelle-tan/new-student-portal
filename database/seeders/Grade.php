<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Grade extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gradeIds = [];

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 1,
            'class_id' => 1,
            'student_record_id' => 1,
            'grade' => 1.00,
            'completion_grade' => 1.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 1,
            'class_id' => 2,
            'student_record_id' => 1,
            'grade' => 1.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 1,
            'class_id' => 3,
            'student_record_id' => 1,
            'grade' => 2.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 1,
            'class_id' => 4,
            'student_record_id' => 1,
            'grade' => 1.03,
            'completion_grade' => 1.03,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 2,
            'class_id' => 1,
            'student_record_id' => 2,
            'grade' => 1.00,
            'completion_grade' => 1.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 2,
            'class_id' => 2,
            'student_record_id' => 2,
            'grade' => 1.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 2,
            'class_id' => 3,
            'student_record_id' => 2,
            'grade' => 2.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 2,
            'class_id' => 4,
            'student_record_id' => 2,
            'grade' => 1.03,
            'completion_grade' => 1.03,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 3,
            'class_id' => 1,
            'student_record_id' => 3,
            'grade' => 1.00,
            'completion_grade' => 1.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 3,
            'class_id' => 2,
            'student_record_id' => 2,
            'grade' => 1.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 3,
            'class_id' => 3,
            'student_record_id' => 3,
            'grade' => 2.00,
            'completion_grade' => 2.00,
            'remarks' => 'Passed',
        ]);

        $gradeIds[] = DB::table('grades')->insert([
            'student_id' => 3,
            'class_id' => 4,
            'student_record_id' => 3,
            'grade' => 1.03,
            'completion_grade' => 1.03,
            'remarks' => 'Passed',
        ]);

        // Store the grade IDs in a file for later use
        file_put_contents(database_path('grade_ids.txt'), implode(',', $gradeIds));
    }
}
