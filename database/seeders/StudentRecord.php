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
        DB::table('student_records')->insert([
            'student_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2021-2022',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        DB::table('student_records')->insert([
            'student_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2021-2022',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        DB::table('student_records')->insert([
            'student_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        DB::table('student_records')->insert([
            'student_id' => 1,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        DB::table('student_records')->insert([
            'student_id' => 2,
            'control_no' => 202101350,
            'school_year' => '2023-2024',
            'semester' => 1,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);

        DB::table('student_records')->insert([
            'student_id' => 2,
            'control_no' => 202101350,
            'school_year' => '2022-2023',
            'semester' => 2,
            'date_enrolled' => '2021-06-22',
            'gwa' => 1.00,
        ]);
    }

}
