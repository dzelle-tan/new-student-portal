<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            ['college_name' => 'College of Information System and Technology Management', 'college_code' => 'CISTM'],
            
            ['college_code' => 'SG', 'college_name' => 'School of Government'],
            ['college_code' => 'PLMBS', 'college_name' => 'PLM Business School'],
            ['college_code' => 'CS', 'college_name' => 'College of Science'],
            ['college_code' => 'CPT', 'college_name' => 'College of Physical Therapy'],
            ['college_code' => 'CN', 'college_name' => 'College of Nursing'],
            ['college_code' => 'CHASS', 'college_name' => 'College of Humanities, Arts, and Social Sciences'],
            ['college_code' => 'CET', 'college_name' => 'College of Engineering and Technology'],
            ['college_code' => 'CED', 'college_name' => 'College of Education'],
            ['college_code' => 'CAUP', 'college_name' => 'College of Architecture and Urban Planning'],

        ];

        foreach ($colleges as $college) {
            \App\Models\College::create($college);
        }
    }
}
