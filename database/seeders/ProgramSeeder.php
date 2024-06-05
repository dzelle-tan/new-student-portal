<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            ['program_title' => 'Bachelor of Science in Computer Science', 'program_code' => 'BSCS', 'degree' => 'Bachelor of Science', 'degree_level' => "Bachelor's", 'num_credits' => 150, 'college_id' => 1],
            ['program_title' => 'Bachelor of Science in Information technology', 'program_code' => 'BSIT', 'degree' => 'Bachelor of Science', 'degree_level' => "Bachelor's", 'num_credits' => 150, 'college_id' => 1],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
    }
}
