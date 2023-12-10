<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Semester extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert([
            [
                'name' => 'First Semester',
                'academic_year' => '2023-2024',
                'start_date' => '2023-08-29',
                'end_date' => '2024-01-16',
                'created_at' => now(),
            ],
            [
                'name' => 'Second Semester',
                'academic_year' => '2023-2024',
                'start_date' => '2024-02-05',
                'end_date' => '2024-06-09',
                'created_at' => now(),
            ],
            [
                'name' => 'Midyear Term',
                'academic_year' => '2023-2024',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-10',
                'created_at' => now(),
            ]
        ]);

        // DB::table('semesters')->insert([
        //     [
        //         'name' => 'First Trimester',
        //         'academic_year' => '2023-2024',
        //         'start_date' => '2024-09-18',
        //         'end_date' => '2024-01-14',
        //         'created_at' => now(),
        //     ],
        //     [
        //         'name' => 'Second Trimester',
        //         'academic_year' => '2023-2024',
        //         'start_date' => '2024-01-22',
        //         'end_date' => '2024-04-05',
        //         'created_at' => now(),
        //     ],
        //     [
        //         'name' => 'Third Trimester',
        //         'academic_year' => '2023-2024',
        //         'start_date' => '2024-05-13',
        //         'end_date' => '2024-07-25',
        //         'created_at' => now(),
        //     ]
        // ]);
    }
}
