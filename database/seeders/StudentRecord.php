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
            'student_no' => 202101350,
            'control_no' => 1,
            'school_year' => '2021-2022',
            'semester' => 1,
            'date_enrolled' => NULL,
            'gwa' => 1.00,
            'status' => 'Enlisted',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('student_records')->insert([
            'student_no' => 20230001,
            'control_no' => 2,
            'school_year' => '2021-2022',
            'semester' => 2,
            'date_enrolled' => now(),
            'gwa' => 1.00,
            'status' => 'Completed',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('student_records')->insert([
            'student_no' => 20235002,
            'control_no' => 3,
            'school_year' => '2022-2023',
            'semester' => 1,
            'date_enrolled' => now(),
            'gwa' => 1.00,
            'status' => 'Completed',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('student_records')->insert([
            'student_no' => 20235003,
            'control_no' => 4,
            'school_year' => '2022-2023',
            'semester' => 2,
            'date_enrolled' => now(),
            'gwa' => 1.00,
            'status' => 'Completed',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('student_records')->insert([
            'student_no' => 20235005,
            'control_no' => 5,
            'school_year' => '2023-2024',
            'semester' => 1,
            'date_enrolled' => NULL,
            'status' => 'Enlisted',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('student_records')->insert([
            'student_no' => 202101351,
            'control_no' => 6,
            'school_year' => '2023-2024',
            'semester' => 1,
            'date_enrolled' => now(),
            'gwa' => 1.00,
            'status' => 'Completed',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
