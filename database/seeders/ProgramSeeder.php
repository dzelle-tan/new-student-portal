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
            ['program_title' => 'Bachelor of Science in Public Administration', 'program_code' => 'BSPA', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 1],
            ['program_title' => 'Bachelor of Science in Accountancy', 'program_code' => 'BS ACCTG', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Business Economics', 'program_code' => 'BSBA BE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Financial Management', 'program_code' => 'BSBA FM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Human Resource Management', 'program_code' => 'BSBA HRM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'program_code' => 'BSBA MM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Operations Management', 'program_code' => 'BSBA OM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Entrepreneurship', 'program_code' => 'BS ENTRE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science In Hospitality Management', 'program_code' => 'BSHM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Tourism Management', 'program_code' => 'BSTM', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
    
            ['program_title' => 'Bachelor of Science in Biology', 'program_code' => 'BS Bio', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Chemistry', 'program_code' => 'BS Chem', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Mathematics', 'program_code' => 'BS Math', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Psychology', 'program_code' => 'BS PSY', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 4],
    
            ['program_title' => 'Bachelor of Science in Physical Therapy', 'program_code' => 'BSPT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 4],
    
            ['program_title' => 'Bachelor of Science in Nursing', 'program_code' => 'BSN', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 5],
    
            ['program_title' => 'Bachelor of Arts in Communication', 'program_code' => 'BAC', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Arts in Communication Major in Public Relations', 'program_code' => 'BAC-PR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Arts in Public Relations', 'program_code' => 'BAPR', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Science in Social Work', 'program_code' => 'BS SW', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
    
            ['program_title' => 'Bachelor of Science in Chemical Engineering', 'program_code' => 'BSCHE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Civil Engineering', 'program_code' => 'BSCE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Computer Engineering', 'program_code' => 'BS CpE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Computer Science', 'program_code' => 'BSCS', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Electrical Engineering', 'program_code' => 'BSEE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Electronics Engineering', 'program_code' => 'BS ECE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Information Technology', 'program_code' => 'BSIT', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Manufacturing Engineering', 'program_code' => 'BSMFGE', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Mechanical Engineering', 'program_code' => 'BSME', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Elementary Education (Generalist)', 'program_code' => 'BEEd', 'degree' => 'BEEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in English', 'program_code' => 'BSEd-Eng', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Filipino', 'program_code' => 'BSEd-Fil', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major Mathematics', 'program_code' => 'BSEd-Math', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Sciences', 'program_code' => 'BSEd-Sciences', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Social Studies', 'program_code' => 'BSEd-SS', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Physical Education', 'program_code' => 'BPE', 'degree' => 'BPE', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
        ];
        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
        // DB::table('programs')->insert($programs);
    }
}
