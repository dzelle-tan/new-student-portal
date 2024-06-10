<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentTerms = [
            // // 2020-2021, Term 2
            // [
            //     'student_no' => 202310001,
            //     'student_type' => 'Regular',
            //     'graduating' => false,
            //     'enrolled' => true,
            //     'year_level' => 1,
            //     'aysem_id' => 112,
            //     'program_id' => 24,
            //     'block_id' => 6,
            //     'registration_status_id' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // // 2021-2022, Term 1
            // [
            //     'student_no' => 202310001,
            //     'student_type' => 'Regular',
            //     'graduating' => false,
            //     'enrolled' => true,
            //     'year_level' => 1,
            //     'aysem_id' => 113,
            //     'program_id' => 24,
            //     'block_id' => 6,
            //     'registration_status_id' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // // 2021-2022, Term 2
            // [
            //     'student_no' => 202310001,
            //     'student_type' => 'Regular',
            //     'graduating' => false,
            //     'enrolled' => true,
            //     'year_level' => 1,
            //     'aysem_id' => 114,
            //     'program_id' => 24,
            //     'block_id' => 5,
            //     'registration_status_id' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // 2022-2023, Term 1
            [
                'student_no' => 202310001,
                'student_type' => 'Old',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 115,
                'program_id' => 24,
                'block_id' => 3,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2022-2023, Term 2
            [
                'student_no' => 202310001,
                'student_type' => 'Old',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 116,
                'program_id' => 24,
                'block_id' => 2,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2023-2024, Term 1
            [
                'student_no' => 202310001,
                'student_type' => 'Old',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 117,
                'program_id' => 24,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // // 2023-2024, Term 2
            // [
            //     'student_no' => 202310001,
            //     'student_type' => 'Regular',
            //     'graduating' => false,
            //     'enrolled' => true,
            //     'year_level' => 2,
            //     'aysem_id' => 118,
            //     'program_id' => 24,
            //     'block_id' => 1,
            //     'registration_status_id' => 2,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        foreach ($studentTerms as $studentTerm) {
            \App\Models\StudentTerm::create($studentTerm);
        }
    }
}
