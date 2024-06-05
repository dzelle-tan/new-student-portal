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
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 1,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 1,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_no' => 202310001,
                'student_type' => 'Regular',
                'graduating' => false,
                'enrolled' => true,
                'year_level' => 2,
                'aysem_id' => 118,
                'program_id' => 1,
                'block_id' => 2,
                'registration_status_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($studentTerms as $studentTerm) {
            \App\Models\StudentTerm::create($studentTerm);
        }
    }
}
