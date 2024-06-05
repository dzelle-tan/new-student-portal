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
            ['program_title' => 'Bachelor of Science in Public Administration', 'program_code' => 'BSPA', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 1],
            ['program_title' => 'Bachelor of Science in Accountancy', 'program_code' => 'BS ACCTG', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Business Economics', 'program_code' => 'BSBA BE', 'major' => 'Business Economics', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Financial Management', 'program_code' => 'BSBA FM', 'major' => 'Financial Management', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Human Resource Management', 'program_code' => 'BSBA HRM', 'major' => 'Human Resource Management', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Marketing Management', 'program_code' => 'BSBA MM', 'major' => 'Marketing Management', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Business Administration Major in Operations Management', 'program_code' => 'BSBA OM', 'major' => 'Operations Management', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 130, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science in Entrepreneurship', 'program_code' => 'BS ENTRE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 2],
            ['program_title' => 'Bachelor of Science In Hospitality Management', 'program_code' => 'BSHM', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Tourism Management', 'program_code' => 'BSTM', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],

            ['program_title' => 'Bachelor of Science in Biology', 'program_code' => 'BS Bio', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Chemistry', 'program_code' => 'BS Chem', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Mathematics', 'program_code' => 'BS Math', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 3],
            ['program_title' => 'Bachelor of Science in Psychology', 'program_code' => 'BS PSY', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 4],

            ['program_title' => 'Bachelor of Science in Physical Therapy', 'program_code' => 'BSPT', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 4],

            ['program_title' => 'Bachelor of Science in Nursing', 'program_code' => 'BSN', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 5],

            ['program_title' => 'Bachelor of Arts in Communication', 'program_code' => 'BAC', 'major' => '', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Arts in Communication Major in Public Relations', 'program_code' => 'BAC-PR', 'major' => 'Public Relations', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Arts in Public Relations', 'program_code' => 'BAPR', 'major' => '', 'degree' => 'BA', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],
            ['program_title' => 'Bachelor of Science in Social Work', 'program_code' => 'BS SW', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 6],

            ['program_title' => 'Bachelor of Science in Chemical Engineering', 'program_code' => 'BSCHE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Civil Engineering', 'program_code' => 'BSCE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Computer Engineering', 'program_code' => 'BS CpE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Computer Science', 'program_code' => 'BSCS', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Electrical Engineering', 'program_code' => 'BSEE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Electronics Engineering', 'program_code' => 'BS ECE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Information Technology', 'program_code' => 'BSIT', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Manufacturing Engineering', 'program_code' => 'BSMFGE', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Science in Mechanical Engineering', 'program_code' => 'BSME', 'major' => '', 'degree' => 'BS', 'degree_level' => 'Undergraduate', 'num_credits' => 150, 'college_id' => 7],
            ['program_title' => 'Bachelor of Elementary Education (Generalist)', 'program_code' => 'BEEd', 'major' => '', 'degree' => 'BEEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in English', 'program_code' => 'BSEd-Eng', 'major' => 'English', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Filipino', 'program_code' => 'BSEd-Fil', 'major' => 'Filipino', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major Mathematics', 'program_code' => 'BSEd-Math', 'major' => 'Mathematics', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Sciences', 'program_code' => 'BSEd-Sciences', 'major' => 'Sciences', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Secondary Education major in Social Studies', 'program_code' => 'BSEd-SS', 'major' => 'Social Studies', 'degree' => 'BSEd', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
            ['program_title' => 'Bachelor of Physical Education', 'program_code' => 'BPE', 'major' => '', 'degree' => 'BPE', 'degree_level' => 'Undergraduate', 'num_credits' => 120, 'college_id' => 8],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
        // DB::table('programs')->insert($programs);
    }
}
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
