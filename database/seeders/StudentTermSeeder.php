<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_terms')->insert([
            [
                'student_type' => 'Old',
                'graduating' => true,
                'enrolled' => true,
                'year_level' => 3,
                'student_no' => 202310001,
                'aysem_id' => 117,
                'program_id' => 1,
                'block_id' => 2,
                'registration_status_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
