<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentRecord extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRecordIds = [];

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2021-2022',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2021-2022',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2023-2024',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        $studentRecordsIds[] = DB::table('student_records')->insert([
            'fees_id' => 2,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

    // Store the student record IDs in a file for later use
    file_put_contents(database_path('student_record_ids.txt'), implode(',', $studentRecordIds));

    }

}
